<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/article/create', [ArticleController::class, 'create'])->middleware('admin');

Route::post('/article/store', [ArticleController::class, 'store'])->middleware('admin');

Route::get('/article/{slug}', [ArticleController::class, 'show']);

Route::post('/article/{slug}/destroy', [ArticleController::class, 'destroy'])->middleware('admin');

Route::get('/article/{slug}/edit', [ArticleController::class, 'edit'])->middleware('admin');

Route::post('/article/{slug}/update', [ArticleController::class, 'update'])->middleware('admin');

Route::post('/article/{id}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::post('/comments/{id}/destroy', [CommentController::class, 'destroy'])->middleware('auth');

Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->middleware('auth');

Route::post('/comments/{id}/update', [CommentController::class, 'update'])->middleware('auth');

Route::post('/register/store', [UserController::class, 'store'])->middleware('guest');

Route::get('/register/create', [UserController::class, 'create'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/login/store', [SessionController::class, 'store'])->middleware('guest');

Route::get('/login/create', [SessionController::class, 'create'])->middleware('guest');






