<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Post;

class PostController extends Controller
{
    public function index() {
    	$this->data['posts'] = Post::all();

    	return view('posts', $this->data);
    }

    public function store($post_id){
        try {
            $post = Post::findOrFail($post_id);
        } catch (Exception $e) {
            return abort(404);
        }

        $this->data['post'] = $post;

        return view('post', $this->data); 
    }

    public function storePosts(){
        $this->data['posts'] = Post::all();

        return view('admin.posts', $this->data);
    }

    public function storePost($post_id){
        try {
            $post = Post::findOrFail($post_id);
        } catch (Exception $e) {
            return abort(404);
        }

        $this->data['post'] = $post;

        return view('admin.post', $this->data); 
    }

    public function update(Request $request, $post_id) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10'  
        ]);

        try {
            $post = Post::findOrFail($post_id);
        } catch (Exception $e) {
            return abort(404);
        };

        $post->name = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect('/admin/posts/'.$post_id);
    }

    public function destroy($post_id) {
        try {
            Post::destroy($post_id);
        } catch (Exception $e) {
            return abort(404);
        };

        return redirect('/admin/posts/');
    }
}