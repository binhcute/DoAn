<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Category;
use DB;

class SearchController extends Controller
{
    public function searchArticleByName(Request $request)
    {
        $article = Article::where('article_name', 'like', '%' . $request->value . '%')->get();

        return response()->json($article);
    }

    public function searchArticleByKeyword(Request $request)
    {
        $article = Article::where('article_keyword', 'like', '%' . $request->value . '%')->get();

        return response()->json($article);
    }

    public function searchProductByName(Request $request)
    {
        $article = Product::where('product_name', 'like', '%' . $request->value . '%')->get();

        return response()->json($article);
    }

    public function searchProductByKeyword(Request $request)
    {
        $article = Product::where('product_keyword', 'like', '%' . $request->value . '%')->get();

        return response()->json($article);
    }

    public function searchPortfolioByName(Request $request)
    {
        $article = Portfolio::where('port_name', 'like', '%' . $request->value . '%')->get();

        return response()->json($article);
    }

    public function searchCategoryByName(Request $request)
    {
        $article = Category::where('cate_name', 'like', '%' . $request->value . '%')->get();

        return response()->json($article);
    }


    public function autocomplete(Request $request)
    {
        $data = Product::select('product_name as name','product_id as id','product_img as img')
            ->where('product_name', "LIKE", "%{$request['query']}%")
            ->get();
        return response()->json($data);
    }
}
