<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use \App\Good;

class CategoryController extends Controller
{
    public function index($category_id){
    	
    	$goods = Good::where('category_id', $category_id)->paginate(6);
    	$category = Category::find($category_id);
    	$category_name = $category->name;
    	
    	$this->data['goods'] = $goods;
    	$this->data['category_name'] = $category_name;

    	return view('category', $this->data);
    }

    public function store($category_id) {
        $goods = Good::where('category_id', $category_id)->paginate(6);
        $category = Category::find($category_id);
        
        $this->data['goods'] = $goods;
        $this->data['category'] = $category;


        return view('admin.category', $this->data);
    }

    public function update(Request $request, $category_id) {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10'  
        ]);

        try {
            $category = Category::findOrFail($category_id);
        } catch (Exception $e) {
            return abort(404);
        };

        $category->name = $request->input('title');
        $category->description = $request->input('description');
        $category->save();

        return redirect('/admin/category/'.$category_id);
    }

    public function updateCategory(Request $request){
        
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:5',
        ]);
        
        $category = new Category();
        $category->name = $request->input('title');
        $category->description = $request->input('description');
        
        $category->save();
        
        return redirect('/admin/category/'.$category->id);
    }

    public function create(){
        return view('admin.categories.create', $this->data);
    }

    public function destroy($category_id) {
        try {
            Good::where("category_id", "=", $category_id)->delete();
            Category::destroy($category_id);
        } catch (Exception $e) {
            return abort(404);
        };

        return redirect('/admin');
    }
}
