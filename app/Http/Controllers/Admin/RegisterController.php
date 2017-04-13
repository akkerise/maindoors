<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegister(){
        return view('adminlte.pages.register');
    }

    public function postRegister(AdminRegisterRequest $request){
        $find_username = User::all()->where('username',$request->username)->first();
        $find_email = User::all()->where('email',$request->email)->first();
        if (count($find_username) > 0){
            dd('Trùng Username');
        }elseif (count($find_email) > 0){
            dd('Trùng Email');
        }else{
            $newUser = new User;
            $newUser->fullname = $request->fullname;
            $newUser->username = $request->username;
            $newUser->password = Hash::make($request->password);
            $newUser->email = $request->email;
            $newUser->remember_token = $request->_token;
            $newUser->level = 2;
            $newUser->confirmed = false;
            $newUser->save();
        }
    }
}
