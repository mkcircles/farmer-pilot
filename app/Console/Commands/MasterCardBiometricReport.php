<?php

namespace App\Console\Commands;

use App\Models\MastercardProfileDetails;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MasterCardBiometricReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:master-card-biometric-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate MasterCard Biometric Report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /**
         * SubjectID
         * Agent ID
         * Time Stamp
         * Existing or New
         * Biotoken flag
         */

        $this->info('Generating MasterCard Biometric Report...');
        $reports = [
            'biometrics' => $this->generateBiometricReport(),
            'existing' => $this->generateExistingUserReport(),
        ];

        //Send email to Mastercard team
        $emails = ['mkamugisha@de.innovationvillage.co.ug', 'cp.partnerprogram@mastercard.com','harrison.angonga@mastercard.com'];
        //$emails = ['mkamugisha@de.innovationvillage.co.ug'];
        Mail::send('mail.daily_biometric_report', ['data'=>$reports], function($message) use ($emails,$reports)
        {
            $message->to($emails)
                ->subject("Biometric Capture Report for ".date('Y-m-d'))
                ->attach(public_path('reports/biometrics/'.$reports['biometrics']['filename']))
                ->attach(public_path('reports/existing/'.$reports['existing']['filename']));
        });
        $this->info('Email Sent');
    }

    private function generateBiometricReport(): array
    {

        $records= MastercardProfileDetails::whereDate('created_at', Carbon::today())->get();

        $data = [];
        $data [] = ['SubjectID', 'Agent ID', 'rID', 'Time Stamp', 'Existing or New', 'Biotoken flag'];

        foreach ($records as $record) {
            $data [] = [
                $record->subjectID,
                $record->farmerProfile->agent->agent_code ?? null,
                $record->rID,
                $record->created_at,
                $record->enrollmentStatus,
                $record->hasBiometricToken,
            ];
        }

        $fileName   = 'BiometricCaptureReport-'.date('Y-m-d').'-'.time().'.csv';

        // (B) WRITE TO CSV FILE
        $file = fopen(public_path('reports/biometrics/'.$fileName), "w");
        foreach ($data as $line) {
            fputcsv($file, $line);
        }
        fclose($file);

        return ['count'=>count($records),'filename'=>$fileName];;
    }

    private function generateExistingUserReport(): array
    {
        $data = [];
        $data [] = ['SubjectID', 'Agent ID', 'rID', 'Time Stamp'];

        $records= MastercardProfileDetails::whereDate('created_at', Carbon::today())
            ->where('enrollmentStatus','EXISTING')
            ->get();

        foreach ($records as $record) {
            //Get Profile that have the same rID from MasterCardProfileDetails
            $getProfiles = MastercardProfileDetails::where('rID',$record->rID)->get();
            foreach ($getProfiles as $getProfile){
                $data [] = [
                    $getProfile->subjectID,
                    $getProfile->farmerProfile->agent->agent_code ?? null,
                    $getProfile->rID,
                    $getProfile->created_at,
                ];
            }
        }

        $fileName   = 'ExistingUserReport-'.date('Y-m-d').'-'.time().'.csv';

        // (B) WRITE TO CSV FILE
        $file = fopen(public_path('reports/existing/'.$fileName), "w");
        foreach ($data as $line) {
            fputcsv($file, $line);
        }
        fclose($file);

        return ['count'=>count($records),'filename'=>$fileName];
    }
}
