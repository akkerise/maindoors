<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Auth;
use App\Services\Contracts\RedisServiceInterface;
use App\Repositories\UserRepositories\UserService;


class UserManagermentController extends Controller {

    protected $userManagerment;
    public $userService;
    private $data;

    public function __construct(UserRepositoryInterface $userManagerment, UserService $userService) {

        $this->userManagerment = $userManagerment;
        $this->userService = $userService;
        
    }

    public function getUser() {

        $users = $this->userService->getAllUser();
        $this->data = $users;
        return view('adminlte.pages.usermanagerment', compact('users'));

    }

    public function getUserProfile($id) {

        $showId = $this->userManagerment->findId($id);
        return view('adminlte.pages.userprofile', compact('showId'));

    }

    public function getUserLevel($param) {
        
        $showUserLevel = $this->userManagerment->getUserByAttr('level', $param);
        return view('adminlte.pages.userlevel')->with([
                    'showUserLevel' => $showUserLevel
        ]);

    }

    public function getDeleteUser($id) {

        $deleteUser = $this->userManagerment->findId($id);
        if ($id === Auth::id() || Auth::user()->level !== 1 || $deleteUser->level === 1) {
            return redirect()->route('admin.dashboard.getUser')->with([
                        'msgAlert' => 'Bạn không có quyền xóa username này ! ',
                        'lvlAlert' => 'danger'
            ]);
        } else {
            $nameDeleteUser = $deleteUser->username;
            $deleteUser->delete();
            $this->userService->updateDatabaseWithRedis();
            return redirect()->route('admin.dashboard.getUser')->with([
                        'msgAlert' => 'Bạn đã xóa thành công username : ' . $nameDeleteUser,
                        'lvlAlert' => 'success'
            ]);
        }

    }

    public function getUserId($id) {

        $userId = $this->userManagerment->findId($id);
        return view('adminlte.pages.usermanagerment', compact('userId'));

    }

    public function postUpdateUser($id, Request $request) {

        foreach ($request->all() as $k => $v) {
            $data[$k] = $v;
        }
        
        $updateUser = $this->userManagerment->findId($id);
        $result = $this->userManagerment->updateUserInfo($data, $id);
        if ($result === true) {
            $this->userService->updateDatabaseWithRedis();
            return redirect()->route('admin.dashboard.getUser')->with([
                        'msgAlert' => 'Bạn đã cập nhật thành công thông tin của username : ' . $updateUser->username,
                        'lvlAlert' => 'success'
            ]);
        } else {
            return redirect()->route('admin.dashboard.getUser')->with([
                        'msgAlert' => 'Bạn đã cập nhật thất bại thông tin của username : ' . $updateUser->username,
                        'lvlAlert' => 'warning'
            ]);
        }
        
    }

    public function getUserIdCallAjax($id) {

        $userId = $this->userManagerment->findId($id);

        if (!$userId) {
            return response()->json([
                        'success' => false,
                        'status' => 404
            ]);
        }

        return response()->json([
                    'success' => true,
                    'status' => 200,
                    'user' => $userId
        ]);
    }



}
