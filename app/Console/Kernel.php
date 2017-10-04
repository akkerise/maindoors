<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Repositories\UserRepositories\UserService;
use App\Services\RedisService;


class Kernel extends ConsoleKernel {

    // public $userService;

    // public function __construct(UserService $userService){
    //     $this->userService = $userService;
    // }

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
            //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        $schedule->call(function () {

        })->everyMinute();
//        $schedule->call('App\Repositories\UserRepositories\UserService@setProductsOnRedis')->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands() {
        require base_path('routes/console.php');
    }

}
