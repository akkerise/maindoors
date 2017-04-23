<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

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

    public function getDeleteUser($id){
        $deleteUser = User::findOrFail($id);
        if ($id === Auth::id() || Auth::user()->level !== 1 || $deleteUser->level === 1){
            return redirect()->route('admin.dashboard.getUser')->with([
                'msgAlert' => 'Bạn không có quyền xóa username này ! ',
                'lvlAlert' => 'danger'
            ]);
        }else{
            $nameDeleteUser = $deleteUser->username;
            $deleteUser->delete();
            return redirect()->route('admin.dashboard.getUser')->with([
                'msgAlert' => 'Bạn đã xóa thành công username : ' . $nameDeleteUser,
                'lvlAlert' => 'success'
            ]);
        }
    }
}
