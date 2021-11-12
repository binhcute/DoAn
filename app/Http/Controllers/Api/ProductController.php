<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Admin\Product\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return ProductResource::collection($product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }

    public function show_pro_by_cate($category)
    {
        $product_by_category = DB::table('tpl_product')
            ->select(
                'tpl_product.*',
                'tpl_category.cate_id AS category_id',
                'tpl_category.user_id AS category_user',
                'tpl_category.cate_name AS category_name',
                'tpl_category.cate_img AS category_img',
                'tpl_category.cate_description AS category_description',
                'tpl_category.created_at AS category_created',
                'tpl_category.updated_at AS category_updated',
                'tpl_category.status AS category_status',
                'tpl_category.view AS category_view'
            )
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_category.cate_id', $category)
            ->where('tpl_product.status', 1)
            ->get();

        // dd($product_by_category);
        return response()->json($product_by_category);
    }
    public function show_pro_by_port($portfolio)
    {
        $product_by_portfolio = DB::table('tpl_product')
            ->select(
                'tpl_product.*',
                'tpl_portfolio.port_id AS portfolio_id',
                'tpl_portfolio.user_id AS portfolio_user',
                'tpl_portfolio.port_name AS portfolio_name',
                'tpl_portfolio.port_origin AS portfolio_origin',
                'tpl_portfolio.port_avatar AS portfolio_avatar',
                'tpl_portfolio.port_img AS portfolio_img',
                'tpl_portfolio.port_description AS portfolio_description',
                'tpl_portfolio.created_at AS portfolio_created',
                'tpl_portfolio.updated_at AS portfolio_updated',
                'tpl_portfolio.status AS portfolio_status'
            )
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', '=', 'tpl_product.port_id')
            ->where('tpl_portfolio.port_id', $portfolio)
            ->where('tpl_product.status', 1)
            ->get();

        // dd($product_by_category);   
        return response()->json($product_by_portfolio);
    }

    public function show_pro_new(){
        $pro_new = DB::table('tpl_product')
        ->orderBy('tpl_product.created_at', 'desc')
        ->limit(6)
        ->get();
        
        return response()->json([
            'data' => $pro_new
        ]);
    }
}
