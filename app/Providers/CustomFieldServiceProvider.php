<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomFieldServiceProvider extends ServiceProvider
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
            'App\Repositories\CustomFieldRepositories\Contracts\CustomFieldRepositoryInterface',
            'App\Repositories\CustomFieldRepositories\Eloquents\CustomFieldRepository'
        );
    }
}
