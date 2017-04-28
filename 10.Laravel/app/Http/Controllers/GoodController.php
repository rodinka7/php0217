<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function index() {
    	$goods = \App\Good::all();
    	

    	$this->data['goods'] = $goods;
    	

    	return view('index', $this->data);
    }

    public function show($good_id){
    	try {
    		$good = \App\Good::findOrFail($good_id);
    	} catch (Exception $e) {
    		return abort(404);
    	}

    	$this->data['good'] = $good;


    	return view('good', $this->data);
    }
}
