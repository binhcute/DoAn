<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Client\AddCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cmt = DB::table('tpl_comment')
            ->select('tpl_comment.*', 'users.firstName', 'users.lastName', 'users.username')
            ->join('users', 'users.id', '=', 'tpl_comment.user_id')->get();
            $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Comment.List')
            ->with('cmt', $cmt)
            ->with('thongBaoMoi',$thongBaoMoi);
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
    public function store(AddCommentRequest $request)
    {
        // dd('aaaaaaa');
        $comment = new Comment();
        $comment->user_id =  Auth::user()->id;
        $comment->product_id = $request->product_id;
        $comment->article_id = $request->article_id;
        $comment->rate = $request->rate;
        $comment->role = $request->role;
        $comment->comment_description = $request->comment_description;
        $comment->status = 1;
        $comment->save();
        if ($comment->save()) {
            if ($request->role == 1) {
                $comment = DB::table('tpl_comment')
            ->select(
                'tpl_comment.comment_description',
                'tpl_comment.rate',
                'tpl_comment.updated_at',
                'users.avatar',
                'users.firstName',
                'users.lastName'
            )
            ->join('users', 'users.id', '=', 'tpl_comment.user_id')
            ->where('tpl_comment.status', 1)
            ->where('tpl_comment.product_id', $request->product_id)
            ->orderBy('tpl_comment.created_at', 'desc')
            ->paginate(4);
                $product_detail = DB::table('tpl_product')
                    ->join('tpl_portfolio', 'tpl_portfolio.port_id', 'tpl_product.port_id')
                    ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
                    ->where('tpl_product.product_id', $request->product_id)->first();
                $giao_dien = view('pages.client.Product-Detail.load-comment', compact(['comment', 'product_detail']))->render();
            } else {
                $comment = DB::table('tpl_comment')
                ->select(
                    'tpl_comment.comment_description',
                    'tpl_comment.updated_at',
                    'users.avatar',
                    'users.firstName',
                    'users.lastName'
                )
                ->join('users', 'users.id', '=', 'tpl_comment.user_id')
                ->where('tpl_comment.status', 1)
                ->where('tpl_comment.article_id', $request->article_id)
                ->orderBy('tpl_comment.created_at', 'desc')->paginate(3);
                $article = DB::table('tpl_article')
                ->select(
                    'tpl_article.*',
                    'users.firstName',
                    'users.lastName',
                    'users.avatar'
                )
                ->join('users', 'users.id', '=', 'tpl_article.user_id')
                ->where('tpl_article.article_id', $request->article_id)->first();
    
                $giao_dien = view('pages.client.Article-Detail.comment-article', compact(['comment', 'article']))->render();
            }
            return response()->json([
                'status' => 'success',
                'giao_dien' =>  $giao_dien,
            ]);
        }
        // dd($comment);
        return;
    }

    public function change_status($id)
    {
        $comment = Comment::find($id);
        if ($comment->status == 1) {
            $comment->status = 0;
            $comment->save();
            if ($comment->save()) {
                $cmt = DB::table('tpl_comment')
                    ->select('tpl_comment.*', 'users.firstName', 'users.lastName', 'users.username')
                    ->join('users', 'users.id', '=', 'tpl_comment.user_id')->get();
                $giao_dien = view('pages.server.Comment.list-item', compact(['cmt']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Ẩn Bình Luận Thành Công',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Đã Ẩn Bình Luận Thất Bại'
            ], 200);
        } else {
            $comment->status = 1;
            $comment->save();
            if ($comment->save()) {
                $cmt = DB::table('tpl_comment')
                    ->select('tpl_comment.*', 'users.firstName', 'users.lastName', 'users.username')
                    ->join('users', 'users.id', '=', 'tpl_comment.user_id')->get();
                $giao_dien = view('pages.server.Comment.list-item', compact(['cmt']))->render();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Hiển Thị Bình Luận Thành Công',
                    'giao_dien' => $giao_dien
                ], 200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'Hiển Thị Bình Luận Thất Bại'
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
        $comment = DB::table('tpl_comment')
            ->join('users', 'users.id', 'tpl_comment.user_id')
            ->leftJoin('tpl_product', 'tpl_product.product_id', 'tpl_comment.product_id')
            ->orwhere('tpl_comment.role', 1)
            ->where('tpl_comment.comment_id', $id)
            ->leftJoin('tpl_article', 'tpl_article.article_id', 'tpl_comment.article_id')
            ->orwhere('tpl_comment.role', 0)
            ->where('tpl_comment.comment_id', $id)
            ->select(
                'tpl_comment.*',
                'users.firstName',
                'users.lastName',
                'users.username',
                'tpl_product.product_id',
                'tpl_product.product_name',
                'tpl_article.article_id',
                'tpl_article.article_name'
            )
            ->first();
            $thongBaoMoi = DB::table('tpl_thong_bao')->orderBy('tpl_thong_bao.created_at', 'desc')->get();
        return view('pages.server.Comment.Show')
            ->with('comment', $comment)
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
