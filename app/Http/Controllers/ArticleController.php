<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\StoreArticleRequest;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('pages.server.article.list')
            ->with('article', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.article.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {

        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->article_name = $request->name;
        $article->article_description = $request->description;
        $article->article_detail = $request->detail;
        $article->article_keyword = $request->keyword;
        $files = $request->file('img');

        // Define upload path
        $destinationPath = public_path('/server/assets/image/article'); // upload path
        // Upload Original Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $article->article_img = "$profileImage";
        $article->status = $request->status;
        // dd($article);
        $article->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Thêm Bài Viết Thành Công'
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
        $article = DB::table('tpl_article')
            ->join('users', 'users.id', '=', 'tpl_article.user_id')
            ->where('article_id', $id)->first();
        return view('pages.server.article.show')
            ->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = Article::find($id);
        return view('pages.server.article.edit')
            ->with('article', $article);
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
        $article = Article::find($id);
        $article->user_id = Auth::user()->id;
        $article->article_name = $request->name;
        $article->article_description = $request->description;
        $article->article_detail = $request->detail;
        $article->article_keyword = $request->keyword;
        $files = $request->file('img');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/article'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $article->article_img = "$profileImage";
        }
        $article->save();
        Session::put('message', 'Cập Nhật Bài ViếtThành Công');
        return redirect()->route('BaiViet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Article::find($id);
        $destroy->delete();
        if ($destroy->delete()) {
            $article = Article::all();
            $giao_dien = view('pages.server.article.list-item', compact(['article']))->render();
            return response()->json([
                'status' => 'success',
                'message' => 'Xóa Bài Viết Thành Công',
                'giao_dien' => $giao_dien
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Xóa Bài Viết Thất Bại'
            ], 200);
        }
    }

    public function change_status($id)
    {
        $change = Article::find($id);
        if ($change->status == 1) {
            $change->status = 0;
            $change->save();
            if ($change->save()) {
                $article = Article::all();
                $giao_dien = view('pages.server.article.list-item', compact(['article']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Ẩn Bài Viết Thành Công',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Đã Ẩn Bài Viết Thất Bại'
            ], 200);
        } else {
            $change->status = 1;
            $change->save();
            if ($change->save()) {
                $article = Article::all();
                $giao_dien = view('pages.server.article.list-item', compact(['article']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Hiển Thị Bài Viết Thành Công',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Hiển Thị Bài Viết Thất Bại'
            ], 200);
        }
    }
}
