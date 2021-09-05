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
use Session;

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
    public function store(Request $request)
    {
        //   dd(Session::get('Cart'));
        $rule = [
            'address' => 'required',
            'phone' => 'required|digits_between:10,12'

        ];

        $validator = Validator::make(Input::all(), $rule);

        if ($validator->fails()) {
            return redirect('/checkout')
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->note = $request->note;
            $order->address = $request->address;
            $order->phone = $request->phone;
            $order->status = 1;
            $order->save();
            foreach (Session::get('Cart')->product as $key => $item) {
                // dd($item);
                $order_dt = new OrderDetail;
                $order_dt->order_id = $order->order_id;
                $order_dt->product_id = $item['product_info']->product_id;
                $order_dt->quantity = $item['qty'];
                $order_dt->price = $item['price'];
                $order_dt->amount = $item['qty'] *  $item['price'];
                // dd($order_dt);
                $order_dt->save();
            }
            $request->Session()->forget('Cart');
            if($order_dt->save()){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Đặt hàng thành công'
                ],200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Đặt hàng thất bại'
            ],200);
            // return redirect()->route('index');
        } catch (Exception $e) {
            echo $e->getMessage();
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
