<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;

class UserProfileController extends Controller {
	protected $userRepository;

	public function __construct(UserRepositoryInterface $userRepository) {
		$this->userRepository = $userRepository;
	}

	public function getUserProfile() {
		return view('adminlte.pages.userprofile');
	}
}
