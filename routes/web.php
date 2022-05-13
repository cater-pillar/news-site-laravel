<?php

use Illuminate\Support\Facades\Route;
use App\Models\Town;
use App\Models\Category;
use App\Models\Article;

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

Route::get('/', function () {

    $articles = Article::query();

    if (request('search')) {
        $articles->where('title', 'like', '%'.request('search').'%')
                 ->orWhere('extract', 'like', '%'.request('search').'%')
                 ->orWhere('body', 'like', '%'.request('search').'%');
    }

    if (request('category')) {
        $articles->where('category_id', request('category'));
    }

    return view('home', [
        'towns' => Town::all(),
        'categories' => Category::all(),
        'articles' => $articles->get()
    ]);
});


Route::get('/article/{id}', function ($id) {
    return view('article', [
        'towns' => Town::all(),
        'categories' => Category::all(),
        'article' => Article::find($id)
    ]);
});

