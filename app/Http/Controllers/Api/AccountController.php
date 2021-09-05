<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account as AccountResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DB;
class AccountController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->username = $request->username;
        $user->avatar = $request->avatar;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();

        return new AccountResource($user);
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
