<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;

class UserManagermentController extends Controller
{
    public function getUser(){
        $users = User::all()->sortBy('id');
        return view('adminlte.pages.usermanagerment',compact('users'));
    }

    public function getUserProfile($id){
        $showId = User::findOrFail($id);
        return view('adminlte.pages.userprofile',compact('showId'));
    }

    public function getUserLevel($level){
        $showUserLevel = User::all()->where('level',$level);
        return view('adminlte.pages.userlevel')->with([
           'showUserLevel' => $showUserLevel
        ]);
    }
}
