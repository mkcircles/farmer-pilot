<?php

namespace App\Console\Commands;

use App\Models\FarmerProfile;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
        $reports = Report::where('report_status', 'pending')->get();
        foreach ($reports as $report) {
            // $report->report_status = 'processing';
            // $report->save();

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
        $qb->whereBetween('created_at', [$from, $to]);
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
        dd($farmers);
        //Create excel report 
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="sample.csv"');

        $header = array(
            'Farmer Id',
            'First name',
            'Last name',
            'DoB',
            'Gender',
            'Education Level',
            'Phone number',
            'id number',
            'Marital status',
            'district',
            'county',
            'sub_county',
            'parish',
            'village',
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
            'Do you have an account with an FI',
            'Farm size',
            'Farm size under agriculture',
            'Land ownership',
            'Type of farming',
            'Crops grown',
            'Animals kept',
            'Last season estimated produce value',
            'This season estimated produce value',
            'rId',
            'Consumer Device Id',
            'Data captured by',
            'Agent code',
            'Agent name',
    );
        $fp = fopen('php://output', 'wb');
        fputcsv($fp, $header, ',');

        foreach($farmers as $farmer) {
            $line = array(
                $farmer->farmer_id,
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
                $farmer->rId,
                $farmer->consumerDeviceId,
                $farmer->data_captured_by,
                $farmer->agent->agent_code,
                $farmer->agent->first_name.' '.$farmer->agent->last_name,
            );

            fputcsv($fp, $line, ',');
        }
        
        fclose($fp);

        

    }

    private function processCropReport($report) {
        
    }
}
