<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\NewsRepositories\Contracts\NewsRepositoryInterface',
            'App\Repositories\NewsRepositories\Eloquents\NewsRepository'
        );
    }
}
