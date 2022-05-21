<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store($id) {

        request()->validate([
            'comment' => 'required',
        ]);

        Comment::create([
            "article_id" => $id,
            "user_id" => auth()->id(),
            "body" => request()->comment
        ]);

        return back();
    }
}
