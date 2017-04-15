<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use Auth;

class AdminLTEMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level === 1) {
            return $next($request);
        } else {
            return redirect()->route('admin.login.getLogin')->with([
                'msgAlert' => 'Stop. Bạn không có quyền vào khu vực này!',
                'lvlAlert' => 'danger'
            ]);
        }
    }
}
