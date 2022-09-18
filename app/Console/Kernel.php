<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
// use App\Models\BookedRoom;

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
        $schedule->command('inspire')->hourly();
        $schedule->command('checkRoom')->dailyAt('07:00')->timezone('Africa/Lagos');
        // $schedule->call(function(){
        //     BookedRoom::query()->where('checkOut', '=', date('Y-m-d'))->update(['room_status' => 'Expired']);
        // })->dailyAt('07:00')->timezone('Africa/Lagos');
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
