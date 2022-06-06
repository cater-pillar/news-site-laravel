<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Models\Town;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index() {
        
        $articles = Article::with('comments', 'category', 'towns');

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
            'articles' => $articles->get()
        ]);
    }


    public function show($id) {
        return view('article', [
            'article' => Article::with('comments.user')->find($id)
        ]);
    }

    public function create() {
        return view('create-article', [
            'towns' => Town::all(),
            'categories' => Category::all(),
        ]);
    }

    public function store() {

        $town_keys = collect(request()->keys())->filter(
            fn($key) => str_contains($key, "town_") && $key);

       $attributes = request()->validate([
           'category_id' => ['required'],
           'title' => ['required'],
           'photo' => ['required'],
           'extract' => ['required'],
           'body' => ['required']
       ]);
        
        $attributes['photo'] = request()->file('photo')->store('images');

        $article = Article::create($attributes);
        foreach($town_keys as $town_key) {
            $article->towns()->attach(request($town_key));
        }
        $article->save();

        return redirect('/')->with('success', 'Uspešno ste objavili vest');
    }

    public function destroy($id) {
        Article::destroy($id);
        return back()->with('success', 'Vest izbrisana!');
    }

    public function edit($id) {
        
        return view('edit-article', [
            'towns' => Town::all(),
            'categories' => Category::all(),
            'article' => Article::with('category', 'towns')->find($id)
        ]);
    }

    public function update($id) {

    /*    
        $town_keys = collect(request()->keys())->filter(
            fn($key) => str_contains($key, "town_") && $key);

       $attributes = request()->validate([
           'category_id' => ['required'],
           'title' => ['required'],
           'extract' => ['required'],
           'body' => ['required']
       ]);
        */
       if(request()->file('photo')) {
        $attributes['photo'] = request()->file('photo')->store('images');
       }
        

    /*    $article = Article::find($id);
        foreach($town_keys as $town_key) {
            $article->towns()->attach(request($town_key));
        }
        $article->save();*/

        return redirect('/')->with('success', 'Uspešno ste ažurirali vest');
    }
}
