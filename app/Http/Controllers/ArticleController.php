<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        
        $articles = Article::with('category', 'towns')->withCount('comments');

        // where can I delegate these if statements?

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

        // how do I cache the articles?

     /*   cache()->rememberForever('articles', function() use ($articles) {
            return $articles->get();
        });*/

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
            'towns' => cache('towns'),
            'categories' => cache('categories'),
        ]);
    }

    public function store() {
        // code repetition: used in update method as well
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
            'towns' => cache('towns'),
            'categories' => cache('categories'),
            'article' => Article::with('category', 'towns')->find($id)
        ]);
    }

    public function update($id) {
        // code repetition: used in create method as well
        $town_keys = collect(request()->keys())->filter(
            fn($key) => str_contains($key, "town_") && $key);

        $town_ids = [];

        foreach($town_keys as $town_key) {
            array_push($town_ids, request($town_key));
        }

       $attributes = request()->validate([
           'category_id' => ['required'],
           'title' => ['required'],
           'extract' => ['required'],
           'body' => ['required']
       ]);
        
        $article = Article::find($id);
        $article->towns()->sync($town_ids);
        if(request()->file('photo')) {
            $article->photo = request()->file('photo')->store('images');
           }
        $article->category_id = $attributes['category_id'];
        $article->title = $attributes['title'];
        $article->extract = $attributes['extract'];
        $article->body = $attributes['body'];
        
        $article->save();

        return redirect('/')->with('success', 'Uspešno ste ažurirali vest');
    }
}
