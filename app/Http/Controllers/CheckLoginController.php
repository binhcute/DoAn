<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CheckLoginController extends Controller
{
    use AuthenticatesUsers;
    public function check(Request $request)
    {
        $admin = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 1,
        ];
        $user = [
            'username' => $request->username,
            'password' => $request->password,
            'level' => 0,
        ];

        if (Auth::attempt($admin)) {
            Session::put('username',$request->username);
            Session::put('id',$request->id);
            return response()->json([
                'status' => 'success',
                'message' => 'Đăng Nhập Thành Công'
            ], 200);
        } elseif(Auth::attempt($user)) {

            return response()->json([
                'status' => 'success',
                'message' => 'Đăng Nhập Thành Công'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Sai Tài Khoản hoặc Mật Khẩu, Vui Lòng Đăng Nhập Lại!'
            ], 200);
        }   
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
