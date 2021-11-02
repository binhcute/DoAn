<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LoginRequest;

class CheckLoginController extends Controller
{
    use AuthenticatesUsers;
    public function check(LoginRequest $request)
    {
        $account = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($account)) {
            if (Auth::user()->status == 1) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đăng Nhập Thành Công'
                ], 200);
            } else {
                Auth::logout();
                return response()->json([
                    'status' => 'error',
                    'message' => 'Tài Khoản Này Chưa Được Kích Hoạt'
                ], 200);
            }
        } else {
            Auth::logout();
            return response()->json([
                'status' => 'error',
                'message' => 'Tài Khoản Hoặc Mật Khẩu Không Chính Xác'
            ], 200);
        }
    }
}
