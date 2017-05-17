<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
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
            'App\Repositories\CategoryRepositories\Contracts\CategoryRepositoryInterface',
            'App\Repositories\CategoryRepositories\Eloquents\CategoryRepository'
        );
    }
}
