<?php

namespace App\Console;

use App\Jobs\GetMatchesResultsJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new GetMatchesResultsJob)->dailyAt('20:10'); // add 2 hours and 10 minutes to games start at 16:00
        $schedule->job(new GetMatchesResultsJob)->dailyAt('00:10'); // add 2 hours and 10 minutes to games start at 22:00
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
