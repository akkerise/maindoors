<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Auth;

class AdminLTEMiddleware
{
    protected $auth;
    protected $guard;
    public function __construct(Auth $auth ,Guard $guard)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth === null || empty($request->user())) {
            return redirect()->route('admin.login.getLogin')->with([
                'msgAlert' => 'Đăng nhập thất bại, mời bạn nhập lại thông tin!',
                'lvlAlert' => 'warning'
            ]);
        }else{
            if ($request->user()->level === 1){
                return $next($request);
            }
            Auth::logout($request->user());
            return redirect()->route('admin.login.getLogin')->with([
                'msgAlert' => 'Bạn tồn tại nhưng bạn không đủ quyền vào khu vực này !',
                'lvlAlert' => 'danger'
            ]);
        }

    }
}
