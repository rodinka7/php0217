<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Good;

class GoodController extends Controller
{
    public function index() {
    	$goods = Good::paginate(6);
    	

    	$this->data['goods'] = $goods;
    	

    	return view('index', $this->data);
    }

    public function show($good_id){

    	$good = Good::find($good_id)->first();

    	$this->data['good'] = $good;

    	return view('good', $this->data);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $result = Good::where('name', 'LIKE', '%$search%')->orWhere('description', 'LIKE', '%$search%')->paginate(6);

        $this->data['goods'] = $result;

        return view('index', $this->data);

    } 
}
