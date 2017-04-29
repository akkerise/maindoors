<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
//use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
class DashboardController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getDashBoard()
    {
        return view('adminlte.pages.dashboard');
    }
}
