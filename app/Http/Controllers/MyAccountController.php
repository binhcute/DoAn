<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MyAccountController extends Controller
{
    public function index()
    {
            $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        // dd($article);
        return view('pages.server.myaccount')
        ->with('thongBaoMoi', $thongBaoMoi);
    }
}
