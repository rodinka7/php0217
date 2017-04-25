<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostController extends Controller
{
    public function index() {
    	$data['posts'] = Post::all();

    	return view('posts.index', $data);
    }

    public function create() {
    	return view('posts.create');
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'title' => 'required|min:5',
            'content' => 'required|min:10'	
    	]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();

    	return redirect('/posts');
    }

    public function edit($post_id) {
        try {
            $post = Post::findOrFail($post_id);
        } catch (Exception $e) {
            return abort(404);
        };

        $data['post'] = $post;

        return view('posts.edit', $data);
    }

    public function update(Request $request, $post_id) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'  
        ]);

        try {
            $post = Post::findOrFail($post_id);
        } catch (Exception $e) {
            return abort(404);
        };

        $post->title = $request->title;
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/posts/edit/'.$post_id);
    }

    public function delete($post_id) {
        try {
            Post::destroy($post_id);
        } catch (Exception $e) {
            return abort(404);
        };

        return redirect('/posts/');
    }
}
