<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Admin\Article\StoreArticleRequest;
use App\Http\Requests\Admin\Article\UpdateArticleRequest;


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
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Article.List')
            ->with('article', $article)
            ->with('thongBaoMoi', $thongBaoMoi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Article.Add')
        ->with('thongBaoMoi', $thongBaoMoi);
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
        $destinationPath = public_path('/image/article'); // upload path
        // Upload Original Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $article->article_img = "$profileImage";
        $article->status = $request->status;
        // dd($article);
        $article->save();
        if($article->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'Thêm Bài Viết Thành Công'
            ], 200);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Thêm Bài Viết Thất Bại'
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
        $article = DB::table('tpl_article')
            ->join('users', 'users.id', '=', 'tpl_article.user_id')
            ->where('article_id', $id)->first();
            $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Article.Show')
            ->with('article', $article)
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

        $article = Article::find($id);
        $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Article.Edit')
            ->with('article', $article)
            ->with('thong_bao_moi',$thongBaoMoi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
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
            $destinationPath = public_path('/image/article'); // upload path
            // Upload Original Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $article->article_img = "$profileImage";
        }
        $article->save();
        if ($article->save()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Cập Nhật Bài Viết Thành Công'
            ],200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Cập Nhật Bài Viết Thất Bại'
            ],200);
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
        $destroy = Article::find($id);
        $destroy->delete();
        if ($destroy->delete()) {
            $article = Article::all();
            $giao_dien = view('pages.server.Article.list-item', compact(['article']))->render();
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
                $giao_dien = view('pages.server.Article.list-item', compact(['article']))->render();
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
                $giao_dien = view('pages.server.Article.list-item', compact(['article']))->render();
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