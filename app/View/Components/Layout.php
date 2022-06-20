<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;
use App\Models\Town;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        cache()->rememberForever('categories', function() {
            return Category::all();
        });

        cache()->rememberForever('towns', function() {
            return Town::all();
        });

        $add_to_title = "";
        if(request('search')) {
            $add_to_title = "Pretraga";
        }
        if(request('category')) {
            $add_to_title = cache('categories')->firstWhere('id', request('category'))->name;
        }
        if(request('town')) {
            $add_to_title = cache('towns')->firstWhere('id', request('town'))->name;
        }

        return view('components.layout', [
            'categories' => cache('categories'),
            'towns' => cache('towns'),
            'add_to_title' => $add_to_title,
        ]);
    }
}
