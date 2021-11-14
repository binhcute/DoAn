<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Account\StoreAccountRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;
use Validator;

class AccountController extends Controller
{
    public function index()
    {
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
                'success' => true,
                'data' => $user,
                'status' => 'success',
                'message' => 'Đăng Ký Thành Công, Vui Lòng Kiểm Tra Email Để Kích Hoạt Tài Khoản'
            ));
        } else {
            return response()->json(array(
                'success' => false,
                'status' => 'error',
                'message' => 'Đăng ký thất bại'
            ));
        }
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            if (Auth::user()->status == 1) {
                $user = $request->user();
                $tokenResult = $user->createToken('Personal Access Token');
                $token = $tokenResult->token;

                if ($request->remember) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }
                $token->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Đăng Nhập Thành Công',
                    'access_token' => $tokenResult->accessToken,
                    'token_type' => 'Bearer',
                    'user' => $user,
                    'expires_at' => Carbon::parse(
                        $tokenResult->token->expires_at
                    )->toDateTimeString()
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Tài khoản chưa được kích hoạt'
                ], 401);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Tài khoản hoặc mật khẩu không chính xác, vui lòng đăng nhập lại'
            ], 401);
        }
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
        // Auth::guard('web')->logout();
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function show_user_by_id($id)
    {
        $user_by_id = DB::table('users')
            ->select(
                'users.*'
            )
            ->where('users.id', $id)
            ->where('users.status', 1)
            ->get();

        // dd($product_by_category);
        return response()->json($user_by_id);
    }

    public function update(Request $request)
    {
        $account = User::findOrFail(Auth::user()->id);
        $avatar = '';
        if($request->avatar != ''){
            $avatar = time() .'.jpg';
            file_put_contents('image/account/'.$avatar,base64_decode($request->avatar));
            $account->avatar = $avatar;
        }
        $account->update();
        return response()->json([
            'success'=>true,
            'user'=>$account,
            'avatar' =>$avatar
        ]);
    }

}
