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
        //Create excel report 
        
        

    }

    private function processCropReport($report) {
        
    }
}
