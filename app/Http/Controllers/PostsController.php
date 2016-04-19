<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{
    public function index() {


    	$posts = Post::orderBy('created_at', 'asc')->get();

    	return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {

    	return view('posts.show', compact('post'));
    }

    public function store(Request $request) {

        $this->validate($request, [ 

            'title' => 'required',
            'content' => 'required'

        ]);

    	$post = new Post;
    	$post->title = $request->title;
    	$post->content = $request->content;
    	$post->save();

    	return redirect('posts');
    }

    public function edit(Post $post) {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post) {

        $this->validate($request, [ 

            'title' => 'required',
            'content' => 'required'

        ]);

        $post->update($request->all());
        return back();
    }


    public function delete(Post $post) {
        $post->deleteRelateComments();
        $post->delete();

        $posts = Post::all();

        return redirect()->route('posts');

        return view('posts.index', compact('posts'));
    }
}
