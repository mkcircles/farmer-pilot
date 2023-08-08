<?php

namespace App\Console\Commands;

use App\Models\FarmerProfile;
use Illuminate\Console\Command;

class DataChecker extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:data-checker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data Check for consistency';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //Fetch User where validation reason is null
        $users = FarmerProfile::whereNull('validation_reason')->limit(10)->get();
        foreach ($users as $user) {
            $user->validation_reason = 'null';
            $user->save();
        }

    }
}
