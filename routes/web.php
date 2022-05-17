<?php

use Illuminate\Support\Facades\Route;
use App\Models\Town;
use App\Models\Category;
use App\Models\Article;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

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

Route::post('/register', [UserController::class, 'create']);

Route::post('/logout', [SessionController::class, 'destroy']);

Route::post('/login', [SessionController::class, 'store']);


Route::get('/login-page', function() {
    return view('login-page');
});