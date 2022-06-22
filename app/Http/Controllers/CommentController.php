<?php

namespace App\Http\Controllers;

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

    public function destroy($id) {
        Comment::destroy($id);
        return back()->with('success', 'Komentar izbrisan!');
    }

    public function edit($id) {   
        return view('edit-comment', [
            'comment' => Comment::find($id)
        ]);
    }

    public function update($id) {
       $attribute = request()->validate([
           'body' => ['required'],
       ]);
        $comment = Comment::with('article')->find($id);
        $comment->body = $attribute['body'];    
        $comment->save();
        return redirect("article/".$comment->article->slug)
               ->with('success', 'Uspešno ste ažurirali komentar');
    }
}
