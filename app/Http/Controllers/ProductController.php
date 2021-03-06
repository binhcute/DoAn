<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::queryJoinCateAndPort()
            ->select(
                'tpl_product.*',
                'tpl_category.cate_id',
                'tpl_category.cate_name',
                'tpl_portfolio.port_id',
                'tpl_portfolio.port_name'
            )->get();
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Product.List')
            ->with('product', $product)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $port = DB::table('tpl_portfolio')
            ->orderBy('port_id', 'desc')->get();
        $cate = DB::table('tpl_category')
            ->orderBy('cate_id', 'desc')->get();
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Product.Add')
            ->with('cate', $cate)
            ->with('port', $port)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->cate_id = $request->cate_id;
        $product->port_id = $request->port_id;
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_description = $request->description;
        $product->product_quantity = $request->quantity;
        $product->product_keyword = $request->keyword;
        $product->status = $request->status;
        $product->view = NULL;
        $files = $request->file('img');
        // Define upload path
        $destinationPath = public_path('/image/product'); // upload path
        // Upload Original Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $product->product_img = "$profileImage";

        //Hover
        $files = $request->file('img_hover');
        if ($files != null) {
            // Define upload path
            $destinationPath = public_path('/image/product/hover'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img_hover'] = "$profileImage";
            // Save In Database
            $product->product_img_hover = "$profileImage";
        }
        $product->save();
        if ($product->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Th??m S???n Ph???m Th??nh C??ng'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Th??m S???n Ph???m Th???t B???i'
            ], 200);
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
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        $product = DB::table('tpl_product')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', '=', 'tpl_product.port_id')
            ->join('users', 'users.id', '=', 'tpl_product.user_id')
            ->where('product_id', $id)->first();
        return view('pages.server.Product.Show')
            ->with('product', $product)
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
        $product = Product::find($id);
        $cate = DB::table('tpl_category')
            ->orderBy('cate_id', 'desc')->get();
        $port = DB::table('tpl_portfolio')
            ->orderBy('port_id', 'desc')->get();
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Product.Edit')
            ->with('product', $product)
            ->with('cate', $cate)
            ->with('port', $port)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->cate_id = $request->cate_id;
        $product->port_id = $request->port_id;
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_description = $request->description;
        $product->product_quantity = $request->quantity;
        $product->product_keyword = $request->keyword;
        $product->view = NULL;
        $files = $request->file('img');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/image/product'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);


            $insert['img'] = "$profileImage";
            // Save In Database
            $product->product_img = "$profileImage";
        }
        $files = $request->file('img_hover');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/image/product/hover'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);


            $insert['img'] = "$profileImage";
            // Save In Database
            $product->product_img_hover = "$profileImage";
        }
        $product->save();

        if ($product->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'C???p Nh???t S???n Ph???m Th??nh C??ng'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'C???p Nh???t S???n Ph???m Th???t B???i'
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
        $destroy = Product::find($id);
        $destroy->delete();
        if ($destroy->delete()) {
            $product = Product::queryJoinCateAndPort()
                ->select(
                    'tpl_product.*',
                    'tpl_category.cate_id',
                    'tpl_category.cate_name',
                    'tpl_portfolio.port_id',
                    'tpl_portfolio.port_name'
                )->get();
            $giao_dien = view('pages.server.Product.list-item', compact(['product']))->render();
            return response()->json([
                'status' => 'success',
                'message' => 'X??a S???n Ph???m Th??nh C??ng',
                'giao_dien' => $giao_dien
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'X??a S???n Ph???m Th???t B???i'
            ], 200);
        }
    }
    public function change_status($id)
    {
        $change = Product::find($id);
        if ($change->status == 1) {
            $change->status = 0;
            $change->save();
            if ($change->save()) {
                $product = Product::queryJoinCateAndPort()
                    ->select(
                        'tpl_product.*',
                        'tpl_category.cate_id',
                        'tpl_category.cate_name',
                        'tpl_portfolio.port_id',
                        'tpl_portfolio.port_name'
                    )->get();
                $giao_dien = view('pages.server.Product.list-item', compact(['product']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => '???n S???n Ph???m Th??nh C??ng',
                    'giao_dien' => $giao_dien,
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => '???? ???n S???n Ph???m Th???t B???i',
            ], 200);
        } else {
            $change->status = 1;
            $change->save();
            if ($change->save()) {
                $product = Product::queryJoinCateAndPort()
                    ->select(
                        'tpl_product.*',
                        'tpl_category.cate_id',
                        'tpl_category.cate_name',
                        'tpl_portfolio.port_id',
                        'tpl_portfolio.port_name'
                    )->get();
                $giao_dien = view('pages.server.Product.list-item', compact(['product']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Hi???n Th??? S???n Ph???m Th??nh C??ng',
                    'giao_dien' => $giao_dien,
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Hi???n Th??? S???n Ph???m Th???t B???i',
            ], 200);
        }
    }
}
