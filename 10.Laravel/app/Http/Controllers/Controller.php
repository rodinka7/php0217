<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;

    public function __construct(){
    	$posts = \App\Post::all();
    	$categories = \App\Category::all();
    	$random_good = \App\Good::find(rand(31,40));

    	$this->data['posts'] = $posts;
    	$this->data['categories'] = $categories;
    	$this->data['random_good'] = $random_good;
    }
}
