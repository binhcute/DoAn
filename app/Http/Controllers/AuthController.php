<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\Account\LoginRequest;
use App\Http\Requests\Admin\StoreAccountRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register(StoreAccountRequest $request)
    {

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
        if ($user->save()) {
            $code = bcrypt(md5(time() . $user->email));
            $url = route('verifyAccount', ['id' => $user->id, 'code' => $code]);
            $user->code = $code;
            $user->save();
            $data = [
                'route' => $url
            ];
            Mail::to($user->email)->send(new \App\Mail\VerifyAccount($data));
            return response()->json(array(
                'success' => 1,
                'data' => $user,
                'status' => 'success',
                'message' => 'Đăng ký thành công'
            ));
        } else {
            return response()->json(array(
                'success' => 0,
                'status' => 'error',
                'message' => 'Đăng ký thất bại'
            ));
        }
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
    // public function logout(Request $request)
    // {
    //     Auth::logout();
    //     return redirect('/');
    // }
    public function verifyAccount(Request $request)
    {
        $checkUser = User::where([
            'code' => $request->code,
            'id' => $request->id
        ])->first();

        if (!$checkUser) {
            return redirect('/login')->with('danger', 'URL khong ton tai');
        }
        $checkUser->status = 1;
        $checkUser->save();

        return redirect('/login')->with('success', 'Verify successful');
    }
    public function getForgotPassword(Request $request)
    {
        return view('auth.password.email');
    }
    public function postForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()
        ]);


        Mail::to($request->email)->send(new \App\Mail\ResetPassword($token));
        return back();
    }
    public function getResetPassword($token)
    {
        return view('auth.password.reset', ['token' => $token]);
    }
    public function postResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        if (!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

        $user = User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('/login')->with('message', 'Your password has been changed!');
    }
}
