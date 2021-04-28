<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function showArticles()
    {
        $articles = Article::all();

         return response()->json($articles);
    }

    public function showArticle($id)
    {
        $article = Article::find($id);

        if(!$article) {
            return response()->json([
                "status" => false,
                "message" => "Post Not Found"
            ]) -> setStatusCode(404, 'Post Not Found' );
        }

         return response()->json($article);
    }
}
