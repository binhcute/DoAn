<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\Admin\Account\StoreAccountRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function register(StoreAccountRequest $request)
    {
        // dd($request->all());
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
            $destinationPath = public_path('/image/account'); // upload path
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
            Mail::to($user->email)->send(new \App\Mail\KichHoatTaiKhoan($data));
            return response()->json(array(
                'success' => 1,
                'data' => $user,
                'status' => 'success',
                'message' => 'Đăng Ký Thành Công, Vui Lòng Kiểm Tra Email Để Kích Hoạt Tài Khoản'
            ));
        } else {
            return response()->json(array(
                'success' => 0,
                'status' => 'error',
                'message' => 'Đăng ký thất bại'
            ));
        }
    }

    public function registerContinue()
    {
        return view('auth.continue_register');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
    public function verifyAccount(Request $request)
    {
        $checkUser = User::where([
            'code' => $request->code,
            'id' => $request->id
        ])->first();

        if (!$checkUser) {
            return redirect('/login')->with('danger', 'Đường Dẫn Không Tồn Tại');
        }
        $checkUser->status = 1;
        $checkUser->code = NULL;
        $checkUser->save();

        return redirect('/login')->with('success', 'Verify successful');
    }
    public function getQuenMatKhau()
    {
        return view('auth.passwords.email');
    }
    public function postQuenMatKhau(Request $request)
    {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $kiemtraEmail = DB::table('users')
            ->where('email', '=', $request->email)->first();
        if (!$kiemtraEmail) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email sai'
            ]);
        } else {

            // dd($kiemtraEmail);
            $token = Str::random(6);
            // dd($token);
            $kiemtraBang = DB::table('tpl_reset_password')
                ->where('email', '=', $request->email)->first();
            if (!$kiemtraBang) {
                DB::table('tpl_reset_password')->insert([
                    'email' => $request->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);
            } else {
                DB::table('tpl_reset_password')
                    ->where(['tpl_reset_password.email' => $request->email])
                    ->update([
                        'token' => $token,
                        'created_at' => Carbon::now()
                    ]);
            }
            // DB::table('tpl_reset_password')->insert([
            //             'email' => $request->email,
            //             'token' => $token,
            //             'created_at' => Carbon::now()
            //         ]);
            $data = [
                'token' => $token,
                'email' => $request->email,
            ];
            Mail::to($request->email)->send(new \App\Mail\ResetMatKhau($data));
            Session::put('status', 'Đã gửi mã OTP về email của bạn');
            return view('auth.passwords.otp')->with('email', $request->email);
        }
    }

    public function postNhapOtp(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:tpl_reset_password',
        ]);
        $check = DB::table('tpl_reset_password')
            ->where('token', '=', $request->tọken)
            ->where('email', '=', $request->email)
            ->orderBy('created_at', 'desc')
            ->first();
        if ($check) {
            $email = DB::table('users')
                ->where('email', '=', $request->email)->first();
            return view('auth.passwords.reset', compact(['email']));
        }
        Session::put('status', 'Sai mã OTP');
        return reload('auth.passwords.reset');
    }

    public function postDatLaiMatKhau(Request $request)
    {
        DB::table('users')
            ->where('email', '=', $request->email)
            ->update([
                'password' =>  Hash::make($request->password)
            ]);
        DB::table('tpl_reset_password')
            ->where('email', '=', $request->email)
            ->update([
                'token' => NULL
            ]);
        return view('auth.login');
    }
}
