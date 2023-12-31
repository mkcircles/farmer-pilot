<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:process-reports')->everyThirtySeconds()->withoutOverlapping();
       // $schedule->command('app:agent-activity-report')->everyFiveSeconds();
        $schedule->command('app:data-checker')->everyTenSeconds();
        $schedule->command('app:master-card-biometric-report')->dailyAt('20:00')->withoutOverlapping();
        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
