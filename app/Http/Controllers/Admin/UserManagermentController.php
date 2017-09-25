<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
use Auth;
use App\Services\Contracts\RedisServiceInterface;
use App\Services\UserService;

class UserManagermentController extends Controller {

    protected $userManagerment;
    public $userService;

    public function __construct(UserRepositoryInterface $userManagerment, UserService $userService) {
        $this->userManagerment = $userManagerment;
        $this->userService = $userService;
    }

    public function getUser() {
        
        $dataUser = $this->userService->getUserByRedis();
        
        $users = $this->userService->arrayToObject($dataUser);
        
        if (!$users || $users === NULL) {
            $users = $this->userManagerment->getAllUserSortByParam('id');
            return view('adminlte.pages.usermanagerment', compact('users'));
        }
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

        if(!$userId){
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

    // need fix
    public function getAllUser() {

        // try {
        //     // $user = $this->userManagerment->getAll();
        //     // $user = User::all();
        //     $user = '1';
        // } catch (PDOException $e) {
        //     dd($e->getMessage());
        // }
        // if (!$user) {
        //     return response()->json([
        //         'status' => 422,
        //         'success' => false,
        //         'message' => 'User not found same you wish !'
        //     ]);
        // }
        // return response()->json([
        //     'status' => 200,
        //     'success' => true,
        //     'data' => $user
        // ]);


        return 1;
    }

}
