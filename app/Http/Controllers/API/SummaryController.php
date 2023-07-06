<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    public function DashboardSummary()
    {

        $total_farmers = \App\Models\FarmerProfile::count();
        $total_fpos = \App\Models\FPO::count();
        $total_agents = \App\Models\Agent::count();
        $system_stats = [
            'total_farmers' => $total_farmers,
            'total_fpos' => $total_fpos,
            'total_agents' => $total_agents,
        ];

        $fpo_stats = [
            'total_registered_fpos' => \App\Models\FPO::where('registration_status', 'Registered')->count(),
            'total_unregistered_fpos' => \App\Models\FPO::where('registration_status', 'No')->count(),
            'total_fpos_membership' => \App\Models\FPO::sum('fpo_membership_number'),
            'total_male_membership' => \App\Models\FPO::sum('fpo_male_membership'),
            'total_female_membership' => \App\Models\FPO::sum('fpo_male_membership'),
            'total_male_youth_membership' => \App\Models\FPO::sum('fpo_male_youth'),
            'total_female_youth_membership' => \App\Models\FPO::sum('fpo_female_youth'),
            
            'total_farmers_registered' => \App\Models\FarmerProfile::where('registration_status', 'Registered')->count(),
            'total_fpos_registered' => \App\Models\FPO::where('registration_status', 'Registered')->count(),
            'total_agents_registered' => \App\Models\Agent::where('registration_status', 'Registered')->count(),
            'total_farmers_unregistered' => \App\Models\FarmerProfile::where('registration_status', 'Unregistered')->count(),
            'total_fpos_unregistered' => \App\Models\FPO::where('registration_status', 'Unregistered')->count(),
            'total_agents_unregistered' => \App\Models\Agent::where('registration_status', 'Unregistered')->count(),
        ]




        return response()->json([
            'system_stats' => $system_stats,
            
            'total_farmers_registered' => 50,
            'total_fpos_registered' => ,
            'total_agents_registered' => 10,
            'total_farmers_unregistered' => 50,
            'total_fpos_unregistered' => 5,
            'total_agents_unregistered' => 10,
        ]);
    }
}
