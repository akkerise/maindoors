<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ForgotPasswordRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function getForgotPassword(){
        return view('adminlte.pages.forgotpassword');
    }

    public function postForgotPassword(AdminForgotPasswordRequest $request){
        dd($request->all());
    }
}
