<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentsController extends Controller
{
    public function store(Request $request, Post $post) {

        $this->validate($request, [ 

            'text' => 'required'

        ]);

    	$comment = new Comment;

    	$comment->text = $request->text;

    	$post->comments()->save($comment);

    	return back();
    }

    public function edit(Comment $comment) {
    	return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment) {
    	$comment->update($request->all()); 
    	return back(); 
    }

    public function delete(Comment $comment) {
        $comment->delete();
        return back();
    }
}
