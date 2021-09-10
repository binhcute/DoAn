<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\StoreCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Category::all();
        return view('pages.server.Category.list')
            ->with('cate', $cate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.Category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $cate = new Category();
        $cate->user_id = Auth::user()->id;
        $cate->cate_name = $request->name;
        $cate->cate_description = $request->description;
        $cate->status = $request->status;
        $files = $request->file('img');
        // Define upload path
        $destinationPath = public_path('/server/assets/image/category'); // upload path
        // Upload Original Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $cate->cate_img = "$profileImage";

        $cate->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Thêm Loại Sản Phẩm Thành Công'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate = DB::table('tpl_category')
            ->join('users', 'users.id', '=', 'tpl_category.user_id')
            ->where('cate_id', $id)->first();
        return view('pages.server.Category.show')
            ->with('cate', $cate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
            ->orderBy('id', 'desc')->first();
        $cate = Category::find($id);
        return view('pages.server.Category.edit')
            ->with('cate', $cate)
            ->with('user', $user);
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
        // dd($request->all());
        $cate = Category::find($id);
        $cate->user_id = Auth::user()->id;
        $cate->cate_name = $request->name;
        $cate->cate_description = $request->description;
        $files = $request->file('img');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/category'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $cate->cate_img = "$profileImage";
        }
        $cate->update();
        if($cate->update()){
            return response()->json([
                'status' => 'success',
                'message' => 'Đã chỉnh sửa danh mục'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Không thể chỉnh sửa loại sản phẩm'
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
        $category = Category::find($id);
        $category->delete();
        if($category->delete()){
            $cate = Category::all();
            $giao_dien = view('pages.server.category.list-item', compact(['cate']))->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa Loại Sản Phẩm Thành Công',
                'giao_dien' => $giao_dien
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Xóa Loại Sản Phẩm Thất Bại'
            ], 200);
        }
    }

    public function change_status($id)
    {
        $change = Category::find($id);
        if ($change->status == 1) {
            $change->status = 0;
            $change->save();
            if ($change->save()) {
                $cate = Category::all();
                $giao_dien = view('pages.server.category.list-item',compact(['cate']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Ẩn Danh Mục Thành Công',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Đã Ẩn Danh Mục Thất Bại'
            ], 200);
        } else {
            $change->status = 1;
            $change->save();
            if ($change->save()) {
                $cate = Category::all();
                $giao_dien = view('pages.server.category.list-item',compact(['cate']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Hiển Thị Danh Mục Thành Công',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Hiển Thị Danh Mục Thất Bại'
            ], 200);
        }
    }
}
