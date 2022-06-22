<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasSlug;

class Town extends Model
{
    use HasFactory;
    use HasSlug;

    public $timestamps = false;

    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
