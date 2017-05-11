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

    public function store($good_id){

    	$good = Good::find($good_id);

    	$this->data['good'] = $good;

    	return view('good', $this->data);
    }

    public function search(Request $request){
        $search = $request->input('search');

        $result = Good::where("name", "LIKE", "%$search%")->orWhere("description", "LIKE", "%$search%")->paginate(6);

        $this->data['goods'] = $result;

        return view('index', $this->data);
    } 

    public function admin() {
        $goods = Good::paginate(6);

        $this->data['goods'] = $goods;

        return view('admin.main', $this->data);
    }

    public function storeGood($good_id){

        $good = Good::find($good_id);

        $this->data['good'] = $good;

        return view('admin.good', $this->data);
    }

    public function create(){
        return view('create.good', $this->data);
    }

    public function update(Request $request, $good_id)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:5',
        ]);

        try {
            $good = Good::findOrFail($good_id);
        }
        catch (Exception $e) {
            return abort(404);
        }

        $good->name = $request->input('title');
        $good->description = $request->input('description');
        $good->price = $request->input('price');
        $good->save();

        $this->data['good'] = $good;

        return view('admin.good', $this->data);
    }

    public function destroy(Request $request, $good_id) {
        try {
            Good::destroy($good_id);
        } catch (Exception $e) {
            return abort(404);
        };

        return redirect('/admin');
    }
}
