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
        $records= MastercardProfileDetails::whereDate('created_at', Carbon::today())->get();
        $data = [];
        $data [] = ['SubjectID', 'Agent ID', 'Time Stamp', 'Existing or New', 'Biotoken flag'];

        foreach ($records as $record) {
            $data [] = [
                $record->subjectID,
                $record->farmerProfile->agent->agent_code ?? null,
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

        //Send email to Mastercard team
        $emails = ['de.tech@de.innovationvillage.co.ug', 'cp.partnerprogram@mastercard.com','harrison.angonga@mastercard.com'];
        Mail::send('mail.biometric_report', [], function($message) use ($emails,$fileName)
        {
            $message->to($emails)
                ->subject("Biometric Capture Report for ".date('Y-m-d'))
                ->attach(public_path('reports/biometrics/'.$fileName));
        });
        $this->info('Email Sent');
    }
}
