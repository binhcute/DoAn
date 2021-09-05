<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Admin\StoreAccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = User::all();
        return view('pages.server.account.list')
            ->with('account', $account);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.account.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        $account = new User();
        $account->firstName = $request->firstName;
        $account->lastName = $request->lastName;
        $account->username = $request->username;
        $account->password = bcrypt($request->password);
        $account->gender = $request->gender;
        $account->phone = $request->phone;
        $account->email = $request->email;
        $account->address = $request->address;
        $account->level = $request->level;
        $account->status = $request->status;
        $files = $request->file('avatar');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/account'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['avatar'] = "$profileImage";
            // Save In Database
            $account->avatar = "$profileImage";
        }
        $account->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Thêm Tài Khoản Thành Công'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $account = DB::table('users')
            ->where('id', $id)->first();
        return view('pages.server.account.show')
            ->with('account', $account);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = User::find($id);
        return view('pages.server.account.edit')
            ->with('account', $account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $account = User::find($id);
        $account->firstName = $request->firstName;
        $account->lastName = $request->lastName;
        $account->username = $request->username;
        $account->gender = $request->gender;
        $account->phone = $request->phone;
        $account->email = $request->email;
        $account->address = $request->address;
        $account->level = $request->level;
        $account->status = $request->status;
        $account->password = bcrypt($request->password);
        $files = $request->file('avatar');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/account'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['avatar'] = "$profileImage";
            // Save In Database
            $account->avatar = "$profileImage";
        }
        $account->save();
        Session::put('message', 'Cập Nhật Tài Khoản Thành Công');
        return redirect()->route('TaiKhoan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = User::find($id);
        $account->delete();
        Session::put('detroy', 'Đã Xóa Tài Khoản');
        return redirect()->route('TaiKhoan.index');
    }

    public function disabled($id)
    {
        $account = User::find($id);
        $account->status = 0;
        $account->save();
        Session::put('info', 'Đã Ẩn Tài Khoản');
        return redirect()->route('TaiKhoan.index');
    }
    public function enabled($id)
    {
        $account = User::find($id);
        $account->status = 1;
        $account->save();
        Session::put('info', 'Đã Hiển Thị Tài Khoản');
        return redirect()->route('TaiKhoan.index');
    }
}
