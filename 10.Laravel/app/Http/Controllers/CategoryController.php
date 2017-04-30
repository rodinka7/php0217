<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category_id){
    	
    	$goods = \App\Good::where('category_id', $category_id)->paginate(6);
    	$category = \App\Category::find($category_id);
    	$category_name = $category->name;
    	
    	$this->data['goods'] = $goods;
    	$this->data['category_name'] = $category_name;


    	return view('category', $this->data);
    }
}
