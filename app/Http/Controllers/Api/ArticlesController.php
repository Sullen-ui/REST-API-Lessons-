<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Validator;
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

    public function storeArticle(Request $request)
    {
            $request_data = $request->only(['title','content']);

            $validator = Validator::make($request_data, [
                "title" => ['required','string'],
                "content" => ['required','string']
            ]);

            if($validator->fails()){
                return response()->json([
                    "status" => false,
                    "errors" => $validator->messages()
                ])->setStatusCode(422);
            }
            // dd($request_data);

           $article = Article::create([
               "title" => $request->title,
               "content" => $request->content,
           ]);

           return response()->json([
                "status" => true,
                "article" => $article
           ])->setStatusCode(201,"Article is store");
    }
}
