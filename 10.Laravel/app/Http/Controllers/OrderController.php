<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use \App\Mail\MyMail;
use \App\Good;
use \App\Order;

class OrderController extends Controller
{
    public function index(){
    	$orders = Order::all();
		$count = 0;
		$price = 0;
		$newOrders = [];

		foreach ($orders as $order) {
			$newGood['name'] = Good::where('id', $order->good_id)->value('name');
			$newGood['image'] = Good::where('id', $order->good_id)->value('image');
			$newGood['id'] = $order->good_id;
			$newGood['created_at'] = $order->created_at;
			$newGood['price'] = $order->price; 

			$price += $order->price;

			$newOrders[] = $newGood;
			$count++;
		}

		$this->data['orders'] = $newOrders;
		$this->data['price'] = $price;
		$this->data['count'] = $count;

		return view('orders', $this->data);
    }

    public function show(Request $request){
    	
    	if (!Auth::check()) {
    		echo 'Авторизируйтесь, пожалуйста!';
    		return;
    	} else {
    		$order = new Order();
    		$order->good_id = $request->input('good_id');
    		$order->price = $request->input('price');
    		$order->user_id = Auth::user()->id;
    		$order->name = $request->input('name');
    		$order->email = $request->input('email');
    		$order->save();
    		
    		Mail::to('kus-kus7@yandex.ru')->queue(new MyMail($order));

    		echo 'Ваше сообщение успешно отправлено!';
    	}
    }
}
