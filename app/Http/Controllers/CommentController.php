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
  
        $comment = Comment::find($id);
        $comment->body = $attribute['body'];
        
        $comment->save();
       // switching to slugs broke the return path
        return redirect("article/$comment->article_id")
               ->with('success', 'Uspešno ste ažurirali komentar');
    }
}
