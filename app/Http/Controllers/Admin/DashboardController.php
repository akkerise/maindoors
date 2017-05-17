<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;

// use App\Repositories\Contracts\UserRepositoryInterface;

class DashboardController extends Controller {
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository) {
		$this->userRepository = $userRepository;
	}

	public function getDashBoard() {
		return view('adminlte.pages.dashboard');
	}
}
