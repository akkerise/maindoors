<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Repositories\UserRepositories\Contracts\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class LoginController extends Controller
{

    protected $redirectAfterLogout = 'admin/login';
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getLogin()
    {
        if (empty(Auth::user())) {
            return view('adminlte.pages.login');
        } 
        return redirect()->route('admin.dashboard.getDashboard')->with([
            'msgAlert' => 'Bạn đã đăng nhập nên không thể đăng nhập lại !',
            'lvlAlert' => 'warning'
        ]);
    }

    public function postLogin(AdminLoginRequest $request)
    {

        $login = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($login)) {
            if (Auth::check() === true) {
                return redirect()->route('admin.dashboard.getDashboard')->with([
                    'msgAlert' => 'Bạn đã đăng nhập thành công !',
                    'lvlAlert' => 'success'
                ]);
            }
        } 
        return redirect()->route('admin.login.getLogin')->with([
            'msgAlert' => 'Đăng nhập thất bại, mời bạn nhập lại thông tin!',
            'lvlAlert' => 'warning'
        ]);

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
