<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRegisterRequest;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;


class RegisterController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getRegister()
    {
        return view('adminlte.pages.register');
    }

    public function postRegister(AdminRegisterRequest $request)
    {
        $find_fullname = $this->userRepository->getUserByAttr('fullname', $request->fullname);
        $find_username = $this->userRepository->getUserByAttr('username', $request->username);
        $find_email = $this->userRepository->getUserByAttr('email', $request->email);
        if (count($find_fullname) > 0) {
            return redirect()->back()->withInput()->with([
                'msgAlert' => 'Bạn nhập tên người đã có người đăng ký trước',
                'lvlAlert' => 'warning'
            ]);
        } elseif (count($find_username) > 0) {
            return redirect()->back()->withInput()->with([
                'msgAlert' => 'Bạn nhập tên tài khoản đã có người đăng ký trước',
                'lvlAlert' => 'warning'
            ]);
        } elseif (count($find_email) > 0) {
            return redirect()->back()->withInput()->with([
                'msgAlert' => 'Bạn nhập tài khoản email đã có người đăng ký trước',
                'lvlAlert' => 'warning'
            ]);
        } else {
            foreach ($request->all() as $k => $v) {
                $data[$k] = $v;
            }
            $result = $this->userRepository->insertNewUser($data);
            if ($result !== true) {
                return redirect()->back()->withInput()->with([
                    'msgAlert' => 'Mail xác thực tài khoản bị lỗi mời bạn liên hệ với quản trị viên !',
                    'lvlAlert' => 'danger'
                ]);
            } else {
                return redirect()->route('admin.login.getLogin')->with([
                    'msgAlert' => 'Đăng ký thành công tài khoản mới , hãy kiểm tra hòm mail để xác thực tài khoản trước khi đăng nhập !',
                    'lvlAlert' => 'success'
                ]);
            }
        }
    }

    public function checkActiveRegister($idNewUser, $md5EmailNewUser){
        $checkNewUser = $this->userRepository->findId($idNewUser);
        if (md5($checkNewUser->email) !== $md5EmailNewUser) {
            return redirect()->route('admin.login.getLogin')->with([
                'msgAlert' => 'Có thể bạn bị giả mạo hoặc đường link xác nhận không đúng !',
                'lvlAlert' => 'danger'
            ]);
        }
        if ($checkNewUser->confirmed === false) {
            $checkNewUser->confirmed = true;
            $checkNewUser->save();
        }
        return view('adminlte.pages.login')->with([
            'msgAlert' => 'Bạn đã xác minh tài khoản thành công mời bạn đăng nhập !',
            'lvlAlert' => 'success'
        ]);
    }
}
