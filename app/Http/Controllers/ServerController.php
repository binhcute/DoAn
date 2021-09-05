<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        $order = Order::all();
        $account = User::all();
        $countProduct = DB::table('tpl_product')
            ->select('user_id')
            ->where('user_id', '=', Auth::user()->id)->get();

        //table order
        $orderList = DB::table('tpl_order_dt')
            ->join('tpl_order', 'tpl_order.order_id', '=', 'tpl_order_dt.order_id')
            ->join('users', 'users.id', '=', 'tpl_order.user_id')
            ->join('tpl_product', 'tpl_product.product_id', '=', 'tpl_order_dt.product_id')
            ->select(
                'users.avatar',
                'users.firstName',
                'users.username',
                'users.lastName',
                'tpl_order.updated_at',
                'tpl_product.product_name',
                'tpl_order_dt.amount',
                'tpl_order.status'
            )
            ->get();
// dd($orderList);
        $countArticle = DB::table('tpl_article')
            ->select('user_id')
            ->where('user_id', '=', Auth::user()->id)->get();
        return view('pages.server.index')
            ->with('product', $product)
            ->with('category', $category)
            ->with('order', $order)
            ->with('account', $account)
            ->with('countProduct', $countProduct)
            ->with('countArticle', $countArticle)
            ->with('orderList', $orderList);
    }

    public function api()
    {
        return view('pages.server.api');
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
