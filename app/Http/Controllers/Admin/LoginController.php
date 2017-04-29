<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
// use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Auth;

class LoginController extends Controller
{

    protected $redirectAfterLogout = 'admin/login';
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
//        $this->middleware('adminlte')->only('getLogin');
        $this->userRepository = $userRepository;
    }

    public function getLogin()
    {
        // dd(1);
//        if (Auth::user()->level === 1) {
//            return redirect()->route('admin.dashboard.getDashboard');
//        } else {
//            return view('adminlte.pages.login');
//        }
        return view('adminlte.pages.login');
    }

    public function postLogin(AdminLoginRequest $request)
    {
        $login = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            if (Auth::user()->level === 1) {
                return redirect()->route('admin.dashboard.getDashboard')->with([
                    'msgAlert' => 'Bạn đã đăng nhập thành công !',
                    'lvlAlert' => 'success'
                ]);
            } else {
                return redirect()->route('admin.login.getLogin')->with([
                    'msgAlert' => 'Stop. Bạn không có quyền vào khu vực này!',
                    'lvlAlert' => 'danger'
                ]);
            }
        } else {
            return redirect()->route('admin.login.getLogin')->with([
                'msgAlert' => 'Bạn đã đăng nhập thất bại!',
                'lvlAlert' => 'warning'
            ]);
        }
    }

    public function getLogout(Request $request)
    {
        Auth::logout($request->user());
        Session::flush();
        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : 'admin/login')->with([
            'msgAlert' => 'Bạn đã thoát ra ngoài ứng dụng thành công !',
            'lvlAlert' => 'success'
        ]);
    }
}
