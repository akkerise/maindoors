<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// use App\Repositories\Contracts\UserRepositoryInterface;
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
            dd($result);
            if ($result !== true) {
                return redirect()->back()->withInput()->with([
                    'msgAlert' => 'Bạn gặp vấn đề khi lưu tài khoản mới vào database' . $result,
                    'lvlAlert' => 'danger'
                ]);
            } else {
                return redirect()->route('admin.login.getLogin')->with([
                    'msgAlert' => 'Tạo thành công tài khoản mới !',
                    'lvlAlert' => 'success'
                ]);
            }
        }
    }
}
