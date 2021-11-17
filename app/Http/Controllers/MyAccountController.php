<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\Admin\Account\UpdateMyAccountRequest;

class MyAccountController extends Controller
{
    public function index()
    {
            $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        // dd($article);
        return view('pages.server.myaccount')
        ->with('thongBaoMoi', $thongBaoMoi);
    }
    public function update(UpdateMyAccountRequest $request,$id){
        $account = User::find($id);
        $account->firstName = $request->firstName;
        $account->lastName = $request->lastName;
        $account->username = $request->username;
        $account->gender = $request->gender;
        $account->phone = $request->phone;
        $account->email = $request->email;
        $account->address = $request->address;
        $account->password = bcrypt($request->password);
        $files = $request->file('img');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/image/account'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['avatar'] = "$profileImage";
            // Save In Database
            $account->avatar = "$profileImage";
        }
        $account->save();
        if ($account->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Cập Nhật Tài Khoản Thành Công'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Cập Nhật Tài Khoản Thất Bại'
            ], 200);
        }
    }
}
