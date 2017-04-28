<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\UserManagermentRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use Auth;

class UserManagermentController extends Controller
{
    protected $userManagerment;

    public function __construct(UserRepositoryInterface $userManagerment)
    {
        $this->userManagerment = $userManagerment;
    }

    public function getUser()
    {
        $users = $this->userManagerment->getAllUserSortByParam('id');
        return view('adminlte.pages.usermanagerment', compact('users'));
    }

    public function getUserProfile($id)
    {
        $showId = $this->userManagerment->findId($id);
        return view('adminlte.pages.userprofile', compact('showId'));
    }

    public function getUserLevel($param)
    {
        $showUserLevel = $this->userManagerment->getUserByAttr('level', $param);
        return view('adminlte.pages.userlevel')->with([
            'showUserLevel' => $showUserLevel
        ]);
    }

    public function getDeleteUser($id)
    {
        $deleteUser = $this->userManagerment->findId($id);
        if ($id === Auth::id() || Auth::user()->level !== 1 || $deleteUser->level === 1) {
            return redirect()->route('admin.dashboard.getUser')->with([
                'msgAlert' => 'Bạn không có quyền xóa username này ! ',
                'lvlAlert' => 'danger'
            ]);
        } else {
            $nameDeleteUser = $deleteUser->username;
            $deleteUser->delete();
            return redirect()->route('admin.dashboard.getUser')->with([
                'msgAlert' => 'Bạn đã xóa thành công username : ' . $nameDeleteUser,
                'lvlAlert' => 'success'
            ]);
        }
    }
}
