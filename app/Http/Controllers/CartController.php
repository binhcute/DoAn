<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Cart;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.client.Cart');
    }


    public function AddCart(Request $request, $id)
    {
        $product = DB::table('tpl_product')->where('product_id', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $id);

            $request->session()->put('Cart', $newCart);
        }
        // $danh_sach = view('pages.client.cart.update-icon-section-start')->gender();
        // $gio_hang = view()
        return view('pages.client.Cart.item-cart');
    }

    public function AddCartDT(Request $request, $id)
    {
        $product = DB::table('tpl_product')->where('product_id', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCartDT($product, $id,$request->qty);

            $request->session()->put('Cart', $newCart);
        }
        return view('pages.client.Cart.item-cart');
    }

    public function DeleteItemCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (count($newCart->product) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        return view('pages.client.Cart.item-cart');
    }

    public function DeleteItemListCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (count($newCart->product) > 0) {
            $request->Session()->put('Cart', $newCart);
        } else {
            $request->Session()->forget('Cart');
        }
        return response()->json([
            'status' => 'success',
            'giao_dien' => view('pages.client.Cart.list-cart')->render(),
        ],200) ;
    }
    public function SaveItemListCart(Request $request, $id, $qty)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->SaveItemListCart($id, $qty);
        $request->Session()->put('Cart', $newCart);
        $giao_dien = view('pages.client.Cart.list-cart')->render();
        return response()->json([
            'status' => 'success',
            'giao_dien' => $giao_dien
        ],200);
    }
}
