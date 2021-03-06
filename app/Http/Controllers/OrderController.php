<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Order::all();
        foreach ($a as $key => $value) {
            $order_id = $value->order_id;
        }
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        $order = DB::table('tpl_order')
            ->select(
                'tpl_order.order_id',
                'tpl_order.updated_at',
                'tpl_order.status',
                'users.username',
                'users.email',
                'tpl_order.note'
            )
            ->join('users', 'users.id', '=', 'tpl_order.user_id')
            ->orderBy('tpl_order.order_id','desc')
            ->get();
        $order_detail = DB::table('tpl_order_dt')
            ->join('tpl_order', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
            ->join('tpl_product', 'tpl_product.product_id', '=', 'tpl_order_dt.product_id')
            ->select(
                'tpl_product.product_img',
                'tpl_product.product_name',
                'tpl_order.*',
                'tpl_order_dt.*'
            )
            ->get();
        return view('pages.server.Order.List')
            ->with('order', $order)
            ->with('order_detail', $order_detail)
            ->with('thongBaoMoi', $thongBaoMoi);
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
        $order_detail = DB::table('tpl_order')
            ->select(
                'tpl_order.order_id',
                'tpl_order.created_at',
                'tpl_order.updated_at',
                'tpl_order.status',
                'tpl_order.note',
                'users.id',
                'users.lastName',
                'users.firstName',
                'users.username',
                'users.phone',
                'users.address',
                'users.email',
            )
            ->join('users', 'users.id', '=', 'tpl_order.user_id')
            ->where('tpl_order.order_id', $id)->first();

        $order = DB::table('tpl_order')
            ->join('tpl_order_dt', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
            ->join('tpl_product', 'tpl_order_dt.product_id', '=', 'tpl_product.product_id')
            ->where('tpl_order.order_id', $id)->get();
            $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();

        return view('pages.server.Order.Show')
            ->with('order_detail', $order_detail)
            ->with('order', $order)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    public function update_status_0($id)
    {

        $change = Order::find($id);
        $change->status = 0;
        $change->save();
        if($change->save()){
            $a = Order::all();
        foreach ($a as $key => $value) {
            $order_id = $value->order_id;
        }
        $order = DB::table('tpl_order')
            ->select(
                'tpl_order.order_id',
                'tpl_order.updated_at',
                'tpl_order.status',
                'users.username',
                'users.email',
                'tpl_order.note'
            )
            ->join('users', 'users.id', '=', 'tpl_order.user_id')
            ->get();
        $order_detail = DB::table('tpl_order_dt')
            ->join('tpl_order', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
            ->join('tpl_product', 'tpl_product.product_id', '=', 'tpl_order_dt.product_id')
            ->select(
                'tpl_product.product_img',
                'tpl_product.product_name',
                'tpl_order.*',
                'tpl_order_dt.*'
            )
            ->get();
            $giao_dien = view('pages.server.Order.list-item', compact(['order','order_detail']))->render();
            $giao_dien_duoi = view('pages.server.Order.list-orderDetail', compact(['order','order_detail']))->render();
            return response()->json([
                'status' => 'success',
                'message' => '????n H??ng ???? Giao Cho Shipper',
                'giao_dien' => $giao_dien,
                'giao_dien_duoi' => $giao_dien_duoi
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => '????n H??ng ???? Giao Cho Shipper Th???t B???i'
        ],200);
    }
    public function update_status_1($id)
    {

        $change = Order::find($id);
        $change->status = 1;
        $change->save();
        if($change->save()){
            $a = Order::all();
            foreach ($a as $key => $value) {
                $order_id = $value->order_id;
            }
            $order = DB::table('tpl_order')
                ->select(
                    'tpl_order.order_id',
                    'tpl_order.updated_at',
                    'tpl_order.status',
                    'users.username',
                    'users.email',
                    'tpl_order.note'
                )
                ->join('users', 'users.id', '=', 'tpl_order.user_id')
                ->get();
            $order_detail = DB::table('tpl_order_dt')
                ->join('tpl_order', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
                ->join('tpl_product', 'tpl_product.product_id', '=', 'tpl_order_dt.product_id')
                ->select(
                    'tpl_product.product_img',
                    'tpl_product.product_name',
                    'tpl_order.*',
                    'tpl_order_dt.*'
                )
                ->get();
                $giao_dien = view('pages.server.Order.list-item', compact(['order','order_detail']))->render();
                $giao_dien_duoi = view('pages.server.Order.list-orderDetail', compact(['order','order_detail']))->render();
                
            return response()->json([
                'status' => 'success',
                'message' => '????n h??ng ??ang ch??? thanh to??n',
                'giao_dien' => $giao_dien,
                'giao_dien_duoi' => $giao_dien_duoi
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => '????n h??ng ??ang ch??? thanh to??n th???t b???i'
        ],200);
    }

    public function update_status_2($id)
    {

        $change = Order::find($id);
        $change->status = 2;
        $change->save();
        if($change->save()){
            $a = Order::all();
            foreach ($a as $key => $value) {
                $order_id = $value->order_id;
            }
            $order = DB::table('tpl_order')
                ->select(
                    'tpl_order.order_id',
                    'tpl_order.updated_at',
                    'tpl_order.status',
                    'users.username',
                    'users.email',
                    'tpl_order.note'
                )
                ->join('users', 'users.id', '=', 'tpl_order.user_id')
                ->get();
            $order_detail = DB::table('tpl_order_dt')
                ->join('tpl_order', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
                ->join('tpl_product', 'tpl_product.product_id', '=', 'tpl_order_dt.product_id')
                ->select(
                    'tpl_product.product_img',
                    'tpl_product.product_name',
                    'tpl_order.*',
                    'tpl_order_dt.*'
                )
                ->get();
                $giao_dien = view('pages.server.Order.list-item', compact(['order','order_detail']))->render();
                $giao_dien_duoi = view('pages.server.Order.list-orderDetail', compact(['order','order_detail']))->render();
            return response()->json([
                'status' => 'success',
                'message' => '????n h??ng ???? giao th??nh c??ng',
                'giao_dien' => $giao_dien,
                'giao_dien_duoi' => $giao_dien_duoi
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => '????n h??ng giao th??nh c??ng th???t b???i'
        ],200);
    }

    public function update_status_3($id)
    {

        $change = Order::find($id);
        $change->status = 3;
        $change->save();
        if($change->save()){
            $a = Order::all();
            foreach ($a as $key => $value) {
                $order_id = $value->order_id;
            }
            $order = DB::table('tpl_order')
                ->select(
                    'tpl_order.order_id',
                    'tpl_order.updated_at',
                    'tpl_order.status',
                    'users.username',
                    'users.email',
                    'tpl_order.note'
                )
                ->join('users', 'users.id', '=', 'tpl_order.user_id')
                ->get();
            $order_detail = DB::table('tpl_order_dt')
                ->join('tpl_order', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
                ->join('tpl_product', 'tpl_product.product_id', '=', 'tpl_order_dt.product_id')
                ->select(
                    'tpl_product.product_img',
                    'tpl_product.product_name',
                    'tpl_order.*',
                    'tpl_order_dt.*'
                )
                ->get();
                $giao_dien = view('pages.server.Order.list-item', compact(['order','order_detail']))->render();
                $giao_dien_duoi = view('pages.server.Order.list-orderDetail', compact(['order','order_detail']))->render();
            return response()->json([
                'status' => 'success',
                'message' => '????n h??ng ???? b??? h???y',
                'giao_dien' => $giao_dien,
                'giao_dien_duoi' => $giao_dien_duoi
            ],200);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'H???y ????n h??ng th???t b???i'
        ],200);
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
