<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreAccountRequest;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account as AccountResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use Validator;

class AccountController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function register(StoreAccountRequest $request)
    {
        if ($request->fails) {
            return response()->json([
                'status' => 'fails',
                'error' => $request->errors()->first(),
            ], 401);
        }

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->username = $request->username;
        $files = $request->file('avatar');
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->level = 0;
        $user->password = Hash::make($request->password);
        $user->status = 0;
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/account'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['avatar'] = "$profileImage";
            // Save In Database
            $user->avatar = "$profileImage";
        }

        $user->save();

        return response()->json(array(
            'success' => 1,
            'data' => $user,
            'status' => 'success',
            'message' => 'Đăng ký thành công'
        ));
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            $user = $request->user();
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;

            if ($request->remember) {
                $token->expires_at = Carbon::now()->addWeeks(1);
            }
            $token->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Đăng Nhập Thành Công',
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Tài khoản hoặc mật khẩu không chính xác, vui lòng đăng nhập lại'
        ], 401);
    }

    public function userInfo(Request $request)
    {
        return response()->json($request->user());
    }
    //     public function logoutApi()
    // { 
    //     if (Auth::check()) {
    //        Auth::user()->AauthAcessToken()->delete();
    //     }
    // }
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
