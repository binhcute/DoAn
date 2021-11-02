<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_hot = Product::queryStatusOne()
            ->orderBy('product_price', 'desc')->limit(4)->get();
        $product_new = Product::queryStatusOne()
            ->orderBy('created_at', 'desc')->limit(4)->get();
        $cate = Category::queryStatusOne()->get();

        $modal = Product::queryModalProduct()->get();
        // dd($modal);
        // foreach ($cate as $key => $value) {
        //     $cate_id = $value->cate_id;
        // }
        // // dd($cate_id);
        // $product_by_category = Product::queryStatusOne() 
        // ->where('cate_id',$cate_id)->get();
        // dd($product_by_category);
        return view('pages.client.index')
            ->with('product_hot', $product_hot)
            ->with('product_new', $product_new)
            ->with('cate', $cate)
            ->with('modal', $modal);
        // ->with('product_by_category', $product_by_category);
    }
    public function product(Request $request)
    {
        $product = Product::queryStatusOne()
            ->orderBy('product_id', 'asc')->paginate(8);
        $product_hot = Product::queryStatusOne()
            ->orderBy('product_price', 'desc')->limit(6)->get();
        $product_new = Product::queryStatusOne()
            ->orderBy('created_at', 'desc')->limit(6)->get();
        $product_cate = Category::queryStatusOne()->get();
        $portfolio = Portfolio::queryStatusOne()->get();

        $modal = Product::queryModalProduct()->get();

        if ($request->ajax()) {
            return view('pages.client.List-product.dsSanPham')
                ->with('product', $product)
                ->with('product_cate', $product_cate)
                ->with('product_hot', $product_hot)
                ->with('product_new', $product_new)
                ->with('portfolio', $portfolio)
                ->with('modal', $modal);
        }
        return view('pages.client.ProductList')
            ->with('product', $product)
            ->with('product_cate', $product_cate)
            ->with('product_hot', $product_hot)
            ->with('product_new', $product_new)
            ->with('portfolio', $portfolio)
            ->with('modal', $modal);
    }
    public function product_detail($slug, $id, Request $request)
    {
        $product_detail = Product::queryJoinCateAndPort()
            ->where('tpl_product.product_id', $id)->first();
        $product_relate = Product::queryJoinCateAndPort()
            ->where('tpl_product.product_id', $id)->get();
        foreach ($product_relate as $key => $value) {
            $cate_id = $value->cate_id;
        }
        $list = Product::queryStatusOne()
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_category.cate_id', $cate_id)
            ->whereNotIn('tpl_product.product_id', [$id])
            ->get();

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
            ->where('tpl_comment.product_id', $id)
            ->orderBy('tpl_comment.created_at', 'desc')
            ->paginate(4);
        $avg_stars = DB::table('tpl_comment')
            ->where('tpl_comment.product_id', $id)
            ->avg('rate');
        $modal = Product::queryModalProduct()->get();
        if ($request->ajax()) {
            return view('pages.client.Product-Detail.dsBinhLuan')
                ->with('list', $list)
                ->with('product_detail', $product_detail)
                ->with('comment', $comment)
                ->with('avg_stars', $avg_stars)
                ->with('modal', $modal);
        }
        return view('pages.client.ProductDetail')
            ->with('list', $list)
            ->with('product_detail', $product_detail)
            ->with('comment', $comment)
            ->with('avg_stars', $avg_stars)
            ->with('modal', $modal);
    }

    //Article

    public function article(Request $request)
    {
        $article = Article::queryStatusOne()->orderBy('created_at', 'desc')->paginate(3);
        //Bài Viết Xem nhiều
        $view_hot = DB::table('tpl_article')
            ->orderBy('tpl_article.view', 'desc')->limit(3)->get();

        if ($request->ajax()) {
            return view('pages.client.Article.dsBaiViet')
                ->with('article', $article)
                ->with('view_hot', $view_hot);
        }
        return view('pages.client.ArticleList')
            ->with('article', $article)
            ->with('view_hot', $view_hot);
    }
    public function article_detail($slug, $id, Request $request)
    {
        $article = DB::table('tpl_article')
            ->select(
                'tpl_article.*',
                'users.firstName',
                'users.lastName',
                'users.avatar'
            )
            ->join('users', 'users.id', '=', 'tpl_article.user_id')
            ->where('tpl_article.article_id', $id)->first();

        $related = DB::table('tpl_article')->inRandomOrder()->limit(2)->get();
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
            ->where('tpl_comment.article_id', $id)
            ->orderBy('tpl_comment.created_at', 'desc')->paginate(3);
        $recent = Article::queryStatusOne()
            ->orderBy('created_at', 'desc')->limit(3)->get();
        $cate = Category::queryStatusOne()
            ->orderBy('created_at', 'desc')->limit(3)->get();


        //Luot Xem
        $article_view = DB::table('tpl_article')
            ->where('article_id', $id)->get();
        foreach ($article_view as $item) {
            $article_id = $item->article_id;
        }

        $luot_xem = Article::where('article_id', $article_id)->first();
        $luot_xem->view = $luot_xem->view + 1;
        $luot_xem->save();
        //Het Luot Xem

        if($request->ajax()){
            return view('pages.client.Article-Detail.comment-article')
            ->with('article', $article)
            ->with('related', $related)
            ->with('comment', $comment)
            ->with('recent', $recent)
            ->with('cate', $cate);
        }

        return view('pages.client.ArticleDetail')
            ->with('article', $article)
            ->with('related', $related)
            ->with('comment', $comment)
            ->with('recent', $recent)
            ->with('cate', $cate);
    }

    //Category

    public function categories_detail()
    {
        $categories = Category::queryStatusOne()->get();
        // dd($categories);
        return view('pages.client.CategoriesDetail')->with('categories', $categories);
    }


    public function categories_list($slug, $id)
    {
        $product_cate = Category::queryStatusOne()->get();
        $portfolio = Portfolio::queryStatusOne()->get();
        $categories = Category::find($id);
        $product_by_category = Product::queryStatusOne()
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_category.cate_id', $id)->get();

        $modal = Product::queryModalProduct()->get();
        return view('pages.client.CategoriesList')
            ->with('categories', $categories)
            ->with('portfolio', $portfolio)
            ->with('product_cate', $product_cate)
            ->with('product_by_category', $product_by_category)
            ->with('modal', $modal);
    }

    //Brand

    public function portfolio_detail()
    {
        $portfolio = Portfolio::queryStatusOne()->get();
        return view('pages.client.PortfolioDetail')->with('portfolio', $portfolio);
    }

    public function portfolio_list($slug, $id)
    {
        $product_cate = Category::queryStatusOne()->get();
        $portfolio = Portfolio::queryStatusOne()->get();
        $port = Portfolio::find($id);
        $product_by_portfolio = Product::queryStatusOne()
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', '=', 'tpl_product.port_id')
            ->where('tpl_portfolio.port_id', $id)->get();
        $modal = Product::queryModalProduct()->get();
        return view('pages.client.PortfolioList')
            ->with('port', $port)
            ->with('portfolio', $portfolio)
            ->with('product_cate', $product_cate)
            ->with('product_by_portfolio', $product_by_portfolio)
            ->with('modal', $modal);
    }

    //Account
    public function my_account()
    {
        // if (Auth::check()) {
        //     $id = Auth::user()->id;
        // }
        // $order = DB::table('tpl_order')
        //     ->where('tpl_order.user_id', $id)->get();
        // foreach ($order as $key => $value) {
        //     $order_id = $value->order_id;
        // }
        // $sumOrder = DB::table('tpl_order_dt')
        //     ->where('tpl_order_dt.order_id', $order_id)->get();

        // dd($order);
        return view('pages.client.MyAccount');
        // ->with('order', $order);
    }

    public function change_my_account(Request $request){
        if(Auth::check()){
            $taikhoan = User::find(Auth::user()->id);
            $taikhoan -> lastName = $request->lastName;
            $taikhoan -> firstName = $request->firstName;
            $taikhoan -> avatar = $request->avatar;
            $taikhoan -> email = $request->email;
            $taikhoan -> phone = $request->phone;
            $taikhoan -> address = $request->address;
            $taikhoan -> birthday = $request->birthday;
            $taikhoan -> gender = $request->gender;
            $taikhoan -> save();

            return response()->json([
                'status' => 'success',
                'message' => 'Thay đổi thông tin thành công'
            ]);
        }
    }

    public function change_password()
    {
        return view('pages.client.change-password');
    }

    public function post_change_password(Request $request){
        // dd($request->all());
        $hashedPassword = Auth::user()->password;
        if(Auth::check() && Hash::check($request->old_password, $hashedPassword)){

            if($request->new_pwd == $request->confirm_pwd){
                // dd('dung');
                $user = User::find(Auth::user()->id);
                $user ->password = Hash::make($request->new_pwd);
                $user ->save();
                return back();
            }
        }    
        dd('sai');
    }

    public function cart()
    {
        return view('pages.client.Cart');
    }
    public function check_out()
    {
        return view('pages.client.Checkout');
    }
    public function contact_us()
    {
        return view('pages.client.ContactUs');
    }
    public function post_contact_us(Request $request){
    }
}
