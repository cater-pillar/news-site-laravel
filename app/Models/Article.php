<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    use HasFactory;

    public function setSlugAttribute($title) {
        $this->attributes['slug'] = Str::slug($title);;
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function towns() {
        return $this->belongsToMany(Town::class);
    }
}
