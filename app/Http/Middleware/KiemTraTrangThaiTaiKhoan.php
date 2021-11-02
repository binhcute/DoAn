<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KiemTraTrangThaiTaiKhoan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->status == 1)
            return $next($request);
        else {
            Auth::logout();
            return response()->json(['status' => 'error', 'message' => 'Tài Khoản Chưa Kích Hoạt']);
        }
    }
}
