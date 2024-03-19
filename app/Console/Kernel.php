<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\VehicleInfo;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function(){
            if (Schema::hasColumn('users', 'inactive')) {
                User::whereNull('inactive')->update(['status' => 'inactive']);
            }
        })->everySecond();
        
        $schedule->call(function(){
            if (Schema::hasColumn('vehicle_infos', 'status')) {
                VehicleInfo::where('status', 'unavailable')->update(['status' => 'updated_status']);
            }
        })->everySecond();
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
