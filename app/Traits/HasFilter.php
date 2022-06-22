<?php
namespace App\Traits;

trait HasFilter {

    public function filter($articles) {
        if (request('search')) {
            $articles->where('title', 'like', '%'.request('search').'%')
                    ->orWhere('extract', 'like', '%'.request('search').'%')
                    ->orWhere('body', 'like', '%'.request('search').'%');
        }

        if (request('category')) {
            $articles->whereHas('category', function($query) {
                return $query->where('slug', request('category'));
            });
        }

        if (request('town')) {
            $articles->whereHas('towns', function($query) {
                return $query->where('slug', request('town'));
            });
        }

        return $articles;
    }

}