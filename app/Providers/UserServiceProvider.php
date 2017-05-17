<?php

namespace App\Providers;

//use App\Http\Controllers\Controller;
//use function foo\func;
//use User\Connection;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(
			'App\Repositories\UserRepositories\Contracts\UserRepositoryInterface',
			'App\Repositories\UserRepositories\Eloquents\UserRepository'
		);
	}
}
