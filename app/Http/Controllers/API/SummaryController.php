<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\FPO;
use App\Models\MastercardProfileDetails;
use App\Models\UnffeOutreach;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * @group Statistics
 * 
 * APIs for managing the system statistics
 */
class SummaryController extends Controller
{
    /**
     * Dashboard Summary
     * 
     * This endpoint returns the summary of the system statistics
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "system_stats": {
     * "total_farmers": 1,
     * "male_farmers": 0,
     * "female_farmers": 1,
     * "total_fpos": 1,
     * "total_agents": 10,
     * "male_agents": 4,
     * "female_agents": 6
     * },
     * "fpo_stats": {
     * "total_registered_fpos": 1,
     * "total_unregistered_fpos": 0,
     * "total_fpos_membership": 100,
     * "total_male_membership": 50,
     * "total_female_membership": 50,
     * "total_male_youth_membership": 23,
     * "total_female_youth_membership": 27
     * }
     * }
     * 
     * 
     */
    public function DashboardSummary()
    {

        $total_farmers = \App\Models\FarmerProfile::count();
        $total_fpos = \App\Models\FPO::count();
        $total_agents = \App\Models\Agent::count();
        $system_stats = [
            'total_farmers' => $total_farmers,
            'male_farmers' => \App\Models\FarmerProfile::where('gender','male')->count(),
            'female_farmers' => \App\Models\FarmerProfile::where('gender','female')->count(),
            'total_fpos' => $total_fpos,
            'total_agents' => $total_agents,
            'male_agents' => \App\Models\Agent::where('gender','male')->count(),
            'female_agents' => \App\Models\Agent::where('gender','female')->count(),
        ];

        $fpo_stats = [
            'total_registered_fpos' => \App\Models\FPO::where('registration_status', 'Registered')->count(),
            'total_unregistered_fpos' => \App\Models\FPO::where('registration_status', 'No')->count(),
            'total_fpos_membership' => \App\Models\FPO::sum('fpo_membership_number'),
            'total_male_membership' => \App\Models\FPO::sum('fpo_male_membership'),
            'total_female_membership' => \App\Models\FPO::sum('fpo_male_membership'),
            'total_male_youth_membership' => \App\Models\FPO::sum('fpo_male_youth'),
            'total_female_youth_membership' => \App\Models\FPO::sum('fpo_female_youth'),
        ];


        return response()->json([
            'system_stats' => $system_stats,
            'fpo_stats' => $fpo_stats,
        ]);
    }

    /**
     * Biometic Summary
     * 
     * This endpoint returns the summary of the system statistics
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "success": true,
     * "data": {
     * "bio_summary": 1,
     * "possible_duplicates": 1,
     * "denied_captures": 1
     * }
     * }
     * 
     */
    public function getBioSummary()
    {
        $data = [
            "bio_summary" => MastercardProfileDetails::whereNotNull('rID')->count(),
            "possible_duplicates" => MastercardProfileDetails::whereNotNull('possible_duplicate')->count(),
            "denied_captures" => MastercardProfileDetails::whereNull('rID')->count(),
        ];
        return response()->json([
            'success' => true,
            'data' => json_encode($data)
        ], 200);
    }

    /**
     * FPO Dashboard Summary
     * 
     * This endpoint returns the summary of the system statistics
     * @authenticated
     * 
     * @header Authorization required The authorization token. Example: Bearer {token}
     * 
     * @response {
     * "success": true,
     * "data": {
     * "registered_farmers": 1,
     * "male_farmers": 0,
     * "female_farmers": 1,
     * "fpo_agents": 1,
     * "male_agents": 0,
     * "female_agents": 1
     * }
     */
    public function FPODashboardSumary(Request $request)
    {
        $fpo_id = $request->user()->fpo_id;
        $fpo = FPO::find($fpo_id);
        $data = [
            'registered_farmers' => $fpo->farmers->count(),
            'male_farmers' => $fpo->farmers->where('gender', 'male')->count(),
            'female_farmers' => $fpo->farmers->where('gender', 'female')->count(),
            'fpo_agents' => $fpo->agents->count(),
            'male_agents' => $fpo->agents->where('gender', 'male')->count(),
            'female_agents' => $fpo->agents->where('gender', 'female')->count(),            
        ];

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }


    public function UNFFESummary()
    {
        
        $expire = Carbon::now()->addMinutes(240);

        $unffeSummary = Cache::remember('unffe_summary',$expire, function(){
            $data = [];
            $data['total_count'] = UnffeOutreach::count();
            $data['total_men'] = UnffeOutreach::where('gender','M')->count();
            $data['total_female'] = UnffeOutreach::where('gender','F')->count();
            $data['total_count'] = UnffeOutreach::count();

            return $data;

        });

    }
}
