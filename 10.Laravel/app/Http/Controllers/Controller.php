<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

use \App\Post;
use \App\Category;
use \App\Good;
use \App\Order;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $data;

    public function __construct(){
    	$posts = Post::all();
    	$categories = Category::all();
    	$random_good = Good::find(rand(11,20));
        $orders = Order::all();
        $count = 0;

        for ($i = 0; $i < 3; $i++) {
            $random_goods[] = Good::find(rand(11,20));
        }

        if (Auth::check()) {
            $orders = Order::where('user_id', Auth::user()->id)->get();
            foreach ($orders as $order){
                $count++;
            }
        }

        foreach ($orders as $order) {
            $count++;
        }

        $this->data['random_goods'] = $random_goods;
    	$this->data['posts'] = $posts;
    	$this->data['categories'] = $categories;
    	$this->data['random_good'] = $random_good;
        $this->data['count'] = $count;
    }
}
