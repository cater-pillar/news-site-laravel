<?php

use Illuminate\Support\Facades\Route;
use App\Models\Town;
use App\Models\Category;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticleController::class, 'index']);


Route::get('/article/{id}', [ArticleController::class, 'show']);

Route::get('/create', [ArticleController::class, 'create']);

Route::post('/store', [ArticleController::class, 'store']);

Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/login', [SessionController::class, 'store'])->middleware('guest');

Route::post('/article/{id}/comments', [CommentController::class, 'store'])->middleware('auth');


Route::get('/login', function() {
    return view('login-page');
})->middleware('guest');