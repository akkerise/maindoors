<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['adminlte'])->except('postLogin');
    }

    public function getLogin(){
        return view('adminlte.pages.login');
    }

    public function postLogin(AdminLoginRequest $request){
        $login = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $user = User::all()->where('username',$request->username)->first();
        $user_level = User::all()->where('username',$request->username)->first();
        dd(Auth::attempt($login));
        // ??? What false when $login true?
        if (Auth::attempt($login) && $user !== NULL && $user_level === 1){
            return redirect()->route('admin.dashboard.getDashboard');
        }else{
            return redirect()->route('admin.login.getLogin');
        }
    }
}
