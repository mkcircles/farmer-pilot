<?php

namespace App\Console\Commands;

use App\Models\FarmerProfile;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

require "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ProcessReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-reports';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process reports';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        //Get Pending reports
        $reports = Report::where('report_status', 'pending')->limit(2)->get();
        foreach ($reports as $report) {
            $report->report_status = 'processing';
            $report->save();

            //Check report type
            switch($report->report_type) {
                case 'farmer-report':
                    $this->processFarmerReport($report);
                    break;
                case 'crop-report':
                    $this->processCropReport($report);
                    break;
                default:
                    break;
            }
        }

    }

    private function processFarmerReport($report) {
      
        $data = json_decode($report->report_params);
       // dd($data->from_date);
       $from = Carbon::parse($data->from_date);
       $to = Carbon::parse($data->to_date);

        $qb = (new FarmerProfile)->newQuery();
        $qb->where('created_at', '>=', date($from).' 00:00:00');
        $qb->where('created_at', '<=', date($to).' 23:59:59');
       // $qb->whereDate('created_at', [$from, $to]);
        unset($data->from_date);
        unset($data->to_date);

        if(isset($data->crops_grown)) {
            $qb->where('crops_grown', 'LIKE', '%'.$data->crops_grown.'%');
            unset($data->crops_grown);
        }
        
        foreach ($data as $k => $v) {
            $qb->where($k, $v);
        }
        $farmers = $qb->get();

        
        //Create excel report 
        $data = [];

        array_push($data, [
            'Farmer Id',
            'First name',
            'Last name',
            'DoB',
            'Gender',
            'Education Level',
            'Phone number',
            'id number',
            'Marital status',
            'District',
            'County',
            'Sub county',
            'Parish',
            'Village',
            'FPO',
            'Farmer cordinates',
            'Next of kin',
            'Next of kin contact',
            'Next of kin address',
            'Male members in_household',
            'Female members in_household',
            'Members above 18',
            'Children below 5',
            'School going children',
            'Head of family',
            'Agricultural activities Earnings',
            'Non-agricultural activities Earnings',
            'Have an account with an FI',
            'Farm size',
            'Farm size under agriculture',
            'Land ownership',
            'Type of farming',
            'Crops grown',
            'Animals kept',
            'Last season estimated produce value',
            'This season estimated produce value',
            'Agent code',
            'Agent name',
            'Created At',
        ]);
       
      
        foreach($farmers as $farmer) {
            $agent_code = $farmer->agent? $farmer->agent->agent_code : null;
            $agent_name = $farmer->agent? $farmer->agent->first_name.' '.$farmer->agent->last_name : null;


            array_push($data, [
                $farmer->id,
                $farmer->first_name,
                $farmer->last_name,
                $farmer->dob,
                $farmer->gender,
                $farmer->education_level,
                $farmer->phone_number,
                $farmer->id_number,
                $farmer->marital_status,
                $farmer->district,
                $farmer->county,
                $farmer->sub_county,
                $farmer->parish,
                $farmer->village,
                $farmer->fpo->fpo_name,
                $farmer->farmer_cordinates,
                $farmer->next_of_kin,
                $farmer->next_of_kin_contact,
                $farmer->next_of_kin_address,
                $farmer->male_members_in_household,
                $farmer->female_members_in_household,
                $farmer->members_above_18,
                $farmer->children_below_5,
                $farmer->school_going_children,
                $farmer->head_of_family,
                $farmer->agricultural_activities_earnings,
                $farmer->non_agricultural_activities_earnings,
                $farmer->do_you_have_an_account_with_an_FI,
                $farmer->farm_size,
                $farmer->farm_size_under_agriculture,
                $farmer->land_ownership,
                $farmer->type_of_farming,
                $farmer->crops_grown,
                $farmer->animals_kept,
                $farmer->last_season_estimated_produce_value,
                $farmer->this_season_estimated_produce_value,
                $agent_code,
                $agent_name,
                $farmer->created_at
            ]);
        }

        $fileName   = Str::slug($report->name, '-').'-'.time().'.csv';

        // (B) WRITE TO CSV FILE
        $file = fopen(public_path('reports/'.$fileName), "w");
        foreach ($data as $line) { 
            fputcsv($file, $line);
         }
        fclose($file);

        

        $report->report_status = 'completed';
        $report->report_url = $fileName;
        $report->save();

    }

    private function processCropReport($report) {
        
    }
}
