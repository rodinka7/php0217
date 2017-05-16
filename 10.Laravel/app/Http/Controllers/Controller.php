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
        $orders = Order::all();
        $random_good;
        $random_goods = [];
        $count = 0;

        while (empty($random_good)) {
            $random_good = Good::find(rand(1,10));    
        }

        for ($i = 0; $i < 3; $i++) {
            while (empty($random_goods[$i])) {
                $random_goods[$i] = Good::find(rand(1,10));
            }
        }

        if (Auth::check()) {
            $orders = Order::where("user_id", "=", Auth::user()->id)->get();
            foreach ($orders as $order){
                ++$count;
            }
        }     

        $this->data['random_goods'] = $random_goods;
    	$this->data['posts'] = $posts;
    	$this->data['categories'] = $categories;
    	$this->data['random_good'] = $random_good;
        $this->data['count'] = $count;
    }
}
