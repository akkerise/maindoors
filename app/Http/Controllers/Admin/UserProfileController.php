<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function getUserProfile(){
        return view('adminlte.pages.userprofile');
    }
}
