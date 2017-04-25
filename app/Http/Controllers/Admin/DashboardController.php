<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\UserRepositoryInterface;

class DashboardController extends Controller
{
    protected $dashboardRepository;

    public function __construct(UserRepositoryInterface $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getDashBoard(){
        return view('adminlte.pages.dashboard');
    }
}
