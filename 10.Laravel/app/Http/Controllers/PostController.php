<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    		'title'=>'required|'	
    	]);

    	return view('posts.create');
    }
}
