<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getDashBoard(){
        $eightNewMemberRegisters = DB::table('users')->orderBy('id','ASC')->take(8);
        return view('adminlte.pages.dashboard',compact('eightNewMemberRegisters'));
    }
}
