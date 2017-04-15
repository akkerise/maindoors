<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AdminRegisterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminlte');
    }

    public function getRegister(){
        return view('adminlte.pages.register');
    }

    public function postRegister(AdminRegisterRequest $request){
        $find_fullname = User::all()->where('fullname',$request->fullname)->first();
        $find_username = User::all()->where('username',$request->username)->first();
        $find_email = User::all()->where('email',$request->email)->first();
        if (count($find_fullname) > 0){
            return redirect()->back()->withInput()->with([
                'msgAlert' => 'Bạn nhập tên người đã có người đăng ký trước',
                'lvlAlert' => 'warning'
            ]);
        }elseif (count($find_username) > 0){
            return redirect()->back()->withInput()->with([
                'msgAlert' => 'Bạn nhập tên tài khoản đã có người đăng ký trước',
                'lvlAlert' => 'warning'
            ]);
        }elseif (count($find_email) > 0){
            return redirect()->back()->withInput()->with([
                'msgAlert' => 'Bạn nhập tài khoản email đã có người đăng ký trước',
                'lvlAlert' => 'warning'
            ]);
        }else{
            $newUser = new User;
            $newUser->fullname = $request->fullname;
            $newUser->username = $request->username;
            $newUser->password = Hash::make($request->password);
            $newUser->email = $request->email;
            $newUser->remember_token = $request->_token;
            $confirm_code = Hash::make($request->fullname);
            $newUser->confirm_code = $confirm_code;
            $newUser->total_money = 0;
            $newUser->level = 2;
            $newUser->confirmed = true;
            $newUser->save();
            return redirect()->route('admin.login.getLogin')->with([
                'msgAlert' => 'Tạo thành công tài khoản mới !',
                'lvlAlert' => 'success'
            ]);
        }
    }
}
