<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Favorite;
use Illuminate\Support\Facades\DB;
use Session;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.client.favorite');
    }


    public function AddFavorite(Request $request, $id)
    {
        $product = DB::table('tpl_product')->where('product_id', $id)->first();
        if ($product != null) {
            $oldFavorite = Session('Favorite') ? Session('Favorite') : null;
            $newFavorite = new Favorite($oldFavorite);
            $newFavorite->AddFavorite($product, $id);

            $request->session()->put('Favorite', $newFavorite);
        }
        return view('pages.client.item-favorite');
    }

    public function DeleteItemFavorite(Request $request, $id)
    {
        $oldFavorite = Session('Favorite') ? Session('Favorite') : null;
        $newFavorite = new Favorite($oldFavorite);
        $newFavorite->DeleteItemFavorite($id);
        if (count($newFavorite->product) > 0) {
            $request->Session()->put('Favorite', $newFavorite);
        } else {
            $request->Session()->forget('Favorite');
        }
        return view('pages.client.item-favorite');
    }

    public function DeleteItemListFavorite(Request $request, $id)
    {
        $oldFavorite = Session('Favorite') ? Session('Favorite') : null;
        $newFavorite = new Favorite($oldFavorite);
        $newFavorite->DeleteItemFavorite($id);
        if (count($newFavorite->product) > 0) {
            $request->Session()->put('Favorite', $newFavorite);
        } else {
            $request->Session()->forget('Favorite');
        }
        return view('pages.client.list-favorite');
    }
    public function SaveItemListFavorite(Request $request, $id, $qty)
    {
        $oldFavorite = Session('Favorite') ? Session('Favorite') : null;
        $newFavorite = new Favorite($oldFavorite);
        $newFavorite->SaveItemListFavorite($id, $qty);
        $request->Session()->put('Favorite', $newFavorite);

        return view('pages.client.list-favorite');
    }
}

