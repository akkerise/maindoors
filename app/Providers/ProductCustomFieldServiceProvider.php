<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ProductCustomFieldServiceProvider extends ServiceProvider
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
            'App\Repositories\ProductCustomFieldRepositories\Contracts\ProductCustomFieldRepositoryInterface',
            'App\Repositories\ProductCustomFieldRepositories\Eloquents\ProductCustomFieldRepository'
        );
    }
}
