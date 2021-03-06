<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticlesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// GET - запросы
// Получение постов из таблицы Articles
Route::get('/articles',[ArticlesController::class, "showArticles"]);  

// Получение одного поста по ID
Route::get('/articles/{id}',[ArticlesController::class, "showArticle"]);  


//POST - запросы
//Добавление нового поста
Route::post('/articles',[ArticlesController::class, "storeArticle"]);  

Route::delete('/articles/{id}',[ArticlesController::class, "deleteArticle"]);  