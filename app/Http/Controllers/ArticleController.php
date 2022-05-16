<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Town;
use App\Models\Category;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        $articles = Article::query();

        if (request('search')) {
            $articles->where('title', 'like', '%'.request('search').'%')
                    ->orWhere('extract', 'like', '%'.request('search').'%')
                    ->orWhere('body', 'like', '%'.request('search').'%');
        }

        if (request('category')) {
            $articles->where('category_id', request('category'));
        }

        if (request('town')) {
            $articles->whereHas('towns', function($query) {
                return $query->where('town_id', '=', request('town'));
            });
        }

        return view('home', [
            'towns' => Town::all(),
            'categories' => Category::all(),
            'articles' => $articles->get()
        ]);
    }


    public function show($id) {
        return view('article', [
            'towns' => Town::all(),
            'categories' => Category::all(),
            'article' => Article::find($id)
        ]);
    }
}
