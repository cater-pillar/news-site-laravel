<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug {

    public function setSlugAttribute($name) {
        $this->attributes['slug'] = Str::slug($name); 
    }

}