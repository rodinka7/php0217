<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    		
            $data = [
                'user' => $request->input('name'),
                'email' =>  $request->input('email'),
                'good' => $request->input('good_id'),
                'price' => $request->input('price')
            ];

    		Mail::send('emails.order', $data, function ($message) {
              $message->to('kus-kus7@yandex.ru', 'Джон Смит')->subject('Новый заказ!');
            });

    		echo 'Ваше сообщение успешно отправлено!';
    	}
    }
}
