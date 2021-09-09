<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreAccountRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account as AccountResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
class AccountController extends Controller
{
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
        $user->level = $request->level;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
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

        return response()->json(array('success' => 1,'data' => $user));
    }

    public function login(Request $request)
    {
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {
            $accessToken = Auth::user()->createToken('authToken')->accessToken;
            return response()->json(['user' => Auth::user(), 'access_token' => $accessToken]);
        }
        return response()->json(['error' => 'Username or password incorrect, please try again!'], 401);
    }

    public function userInfo(Request $request)
    {
        return response()->json($request->user('api'));
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
