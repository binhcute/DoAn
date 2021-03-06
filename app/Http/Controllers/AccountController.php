<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\Admin\Account\StoreAccountRequest;
use App\Http\Requests\Admin\Account\UpdateAccountRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = DB::table('users')
            ->where('level', '0')->get();
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        // dd($thongBaoMoi);
        return view('pages.server.Account.List')
            ->with('account', $account)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.account.add')
            ->with('thongBaoMoi', $thongBaoMoi);
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
            $destinationPath = public_path('/image/account'); // upload path
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
            'message' => 'Th??m T??i Kho???n Th??nh C??ng'
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

        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.account.show')
            ->with('account', $account)
            ->with('thongBaoMoi', $thongBaoMoi);
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
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.account.edit')
            ->with('account', $account)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAccountRequest $request, $id)
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
                'message' => 'C???p Nh???t T??i Kho???n Th??nh C??ng'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'C???p Nh???t T??i Kho???n Th???t B???i'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        if ($destroy->delete()) {
            $account = DB::table('users')
                ->where('level', '0')->get();
            $giao_dien = view('pages.server.Account.list_item_client', compact(['account']))->render();
            return response()->json([
                'status' => 'success',
                'message' => 'X??a T??i Kho???n Th??nh C??ng',
                'giao_dien' => $giao_dien
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'X??a T??i Kho???n Th???t B???i'
        ], 200);
    }
    public function destroy_admin($id)
    {
        $destroy = User::find($id);
        $destroy->delete();
        if ($destroy->delete()) {
            $account = DB::table('users')
                ->where('level', '0')
                ->whereNotIn('id', [1])->get();
            $giao_dien = view('pages.server.Account.list_item_admin', compact(['account']))->render();
            return response()->json([
                'status' => 'success',
                'message' => 'X??a T??i Kho???n Th??nh C??ng',
                'giao_dien' => $giao_dien
            ], 200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'X??a T??i Kho???n Th???t B???i'
        ], 200);
    }

    public function admin_list()
    {
        $account = DB::table('users')
            ->where('level', '1')
            ->whereNotIn('id', [1])->get();
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        // dd($thongBaoMoi);
        return view('pages.server.Account.List_admin')
            ->with('account', $account)
            ->with('thongBaoMoi', $thongBaoMoi);
    }
    public function change_status($id)
    {
        $change = User::find($id);
        if ($change->status == 1) {
            $change->status = 0;
            $change->save();
            if ($change->save()) {
                $account = DB::table('users')
                    ->where('level', '0')->get();
                $giao_dien = view('pages.server.Account.list_item_client', compact(['account']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Kh??a T??i Kho???n Th??nh C??ng',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Kh??a T??i Kho???n Th???t B???i'
            ], 200);
        } else {
            $change->status = 1;
            $change->save();
            if ($change->save()) {
                $account = DB::table('users')
                    ->where('level', '0')->get();
                $giao_dien = view('pages.server.Account.list_item_client', compact(['account']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'K??ch Ho???t T??i Kho???n Th??nh C??ng',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'K??ch Ho???t T??i Kho???n Th???t B???i'
            ], 200);
        }
    }
    public function change_status_admin($id)
    {
        $change = User::find($id);
        if ($change->status == 1) {
            $change->status = 0;
            $change->save();
            if ($change->save()) {
                $account = DB::table('users')
                    ->where('level', '1')
                    ->whereNotIn('id', [1])->get();
                $giao_dien = view('pages.server.Account.list_item_admin', compact(['account']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Kh??a T??i Kho???n Th??nh C??ng',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Kh??a T??i Kho???n Th???t B???i'
            ], 200);
        } else {
            $change->status = 1;
            $change->save();
            if ($change->save()) {
                $account = DB::table('users')
                    ->where('level', '1')
                    ->whereNotIn('id', [1])->get();
                $giao_dien = view('pages.server.Account.list_item_admin', compact(['account']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'K??ch Ho???t T??i Kho???n Th??nh C??ng',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'K??ch Ho???t T??i Kho???n Th???t B???i'
            ], 200);
        }
    }
}
