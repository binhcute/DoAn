<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\OrderController;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Events\MyEvent;
use Carbon\Carbon;
use App\Models\ThongBao;
use App\Http\Requests\Client\CheckOutRequest;

class CheckOutController extends Controller
{
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
    public function store(CheckOutRequest $request)
    {
        $ds_gio_hang = Session('Cart') ? Session('Cart') : null;
        if ($ds_gio_hang != null) {
            foreach ($ds_gio_hang->product as $key => $san_pham) {
                $kho_san_pham = Product::where('product_id', $san_pham['product_info']->product_id)->first();
                if ($kho_san_pham->product_quantity < $san_pham['qty']) {
                    return response()->json([
                        'status' => 'error',
                        'message' => $kho_san_pham->product_name . ' chỉ còn ' . $kho_san_pham->product_quantity . ' sản phẩm!',
                    ], 200);
                } else {
                    $order = new Order;
                    $order->user_id = Auth::user()->id;
                    $order->note = $request->note;
                    $order->address = $request->address;
                    $order->phone = $request->phone;
                    $order->status = 1;
                    $order->save();
                    foreach (Session::get('Cart')->product as $key => $item) {
                        $order_dt = new OrderDetail;
                        $order_dt->order_id = $order->order_id;
                        $order_dt->product_id = $item['product_info']->product_id;
                        $order_dt->quantity = $item['qty'];
                        $order_dt->price = $item['product_info']->product_price;
                        $order_dt->amount = $item['qty'] *  $item['product_info']->product_price;

                        $san_pham_ton = Product::where('product_id', $order_dt->product_id)->first();
                        $san_pham_ton->product_quantity -= $item['qty'];

                        $san_pham_ton->save();
                        $order_dt->save();
                    }
                    if ($order_dt->save()) {
                        foreach (Session::get('Cart')->product as $key => $item) {
                            $product_name = $item['product_info']->product_name;
                            $product_quantity = $item['qty'];
                            $product_price = $item['price'];
                            $product_amount = $item['qty'] *  $item['price'];
                        }
                        // $productName = DB::table('tpl_order_dt')
                        //     ->join('tpl_product', 'tpl_product.product.product_id', 'tpl_order_dt.product_id')
                        //     ->select('tpl_product.product_name')
                        //     ->where('tpl_order_dt.order_dt_id', $order_dt->order_dt_id)->first();
                        $message = [
                            'logo' => "{{URL::to('/')}}/client/images/logo/logo-2.png",
                            'slider' => "{{URL::to('/')}}/client/images/slider/image-4.png",
                            'fullName' => Auth::user()->firstName . " " . Auth::user()->lastName,
                            'name' => Auth::user()->lastName,
                            'address' => $order->address,
                            'phone' => $order->phone,
                            'notes' => $order->notes,
                            'created_at' => $order->created_at,
                            'order_id' => $order->order_id
                        ];
                        Mail::to(auth()->user()->email)->send(new \App\Mail\XuLyDonHang($message));

                        $noi_dung_thong_bao = [
                            'id_nguoi_dung' => Auth::user()->id,
                            'ten_nguoi_dung' => Auth::user()->lastName,
                            'username_nguoi_dung' => Auth::user()->username,
                            'email_nguoi_dung' => Auth::user()->email,
                            'avatar_nguoi_dung' => Auth::user()->avatar,
                            'don_hang_id' => $order->order_id,
                            'thoi_gian' => Carbon::now('Asia/Ho_Chi_Minh')->format('h:i:s d-m-Y')
                        ];
                        $them_thong_bao = new ThongBao();
                        $them_thong_bao->noi_dung = json_encode($noi_dung_thong_bao);
                        $them_thong_bao->save();

                        event(new MyEvent($noi_dung_thong_bao));
                        $request->Session()->forget('Cart');
                        return response()->json([
                            'status' => 'success',
                            'message' => 'Đặt hàng thành công',
                            'content' => 'Chúng tôi sẽ gọi đến bạn trong thời gian sớm nhất'
                        ], 200);
                    }
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Đặt hàng thất bại'
                    ], 200);
                }
            }
        }
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
