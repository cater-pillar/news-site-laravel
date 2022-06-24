<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Article;
use App\Traits\TownFinder;
use App\Traits\HasFilter;

class ArticleController extends Controller
{

    use TownFinder;
    use HasFilter;

    public function index() {
        
        $articles = $this->filter(
            Article::with('category', 'towns')
            ->withCount('comments')
        );

        // how do I cache the articles?

        return view('home', [
            'articles' => $articles->orderBy('created_at', 'DESC')->get()
        ]);
    }


    public function show($slug) {
        // this should probably change (model binding)
        return view('article', [
            'article' => Article::with('comments.user')
                         ->where('slug', $slug)->first()
        ]);
    }

    public function create() {
        return view('create-article', [
            'towns' => cache('towns'),
            'categories' => cache('categories'),
        ]);
    }

    public function store() {
 
        $town_keys = $this->getTownKeys();

       $attributes = request()->validate([
           'category_id' => ['required'],
           'title' => ['required'],
           'photo' => ['required'],
           'extract' => ['required'],
           'body' => ['required']
       ]);
        
        $attributes['photo'] = request()->file('photo')->store('images');
        $attributes['slug'] = request('title');

        $article = Article::create($attributes);
        foreach($town_keys as $town_key) {
            $article->towns()->attach(request($town_key));
        }
        $article->save();

        return redirect('/')->with('success', 'Uspešno ste objavili vest');
    }

    public function destroy($slug) {
        Article::where('slug', $slug)->first()->delete();
        return back()->with('success', 'Vest izbrisana!');
    }

    public function edit($slug) {
        
        return view('edit-article', [
            'towns' => cache('towns'),
            'categories' => cache('categories'),
            'article' => Article::with('category', 'towns')
                         ->where('slug', $slug)->first()
        ]);
    }

    public function update($slug) {

        $town_ids = $this->getTownIds();
       

       $attributes = request()->validate([
           'category_id' => ['required'],
           'title' => ['required'],
           'extract' => ['required'],
           'body' => ['required']
       ]);
        
        $article = Article::where('slug', $slug)->first();
        $article->towns()->sync($town_ids);
        if(request()->file('photo')) {
            $article->photo = request()->file('photo')->store('images');
           }
        $article->category_id = $attributes['category_id'];
        $article->title = $attributes['title'];
        $article->slug = $attributes['title'];
        $article->extract = $attributes['extract'];
        $article->body = $attributes['body'];
        
        $article->save();

        return redirect('/')->with('success', 'Uspešno ste ažurirali vest');
    }
}
