<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promotion;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $khuyenmai = Promotion::all();
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Promotion.List', compact(['khuyenmai', 'thongBaoMoi']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Promotion.Add')
        ->with('thongBaoMoi',$thongBaoMoi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $khuyenmai = new Promotion();
        $khuyenmai->promotion_name = $request->promotion_name;
        if ($request->promotion_key == NULL) {
            $khuyenmai->promotion_key = Str::random(6);
        } else {
            $khuyenmai->promotion_key = $request->promotion_key;
        }
        $khuyenmai->promotion_money = $request->promotion_money;
        $khuyenmai->end_at = $request->end_at;
        $khuyenmai->save();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Thanh Cong'

            ],
            200
        );
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
        $khuyenmai = Promotion::find($id);
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Promotion.Edit',compact(['khuyenmai','thongBaoMoi']));
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
        $khuyenmai = Promotion::find($id);
        $khuyenmai ->promotion_name = $request->promotion_name;
        $khuyenmai-> promotion_key = $request->promotion_key;
        $khuyenmai-> promotion_money = $request->promotion_money;
        $khuyenmai-> end_at = $request->end_at;
        $khuyenmai-> save();
        return response()->json(
            [
                'status' => 'success',
                'message' => 'Thanh Cong'

            ],
            200
        );
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
