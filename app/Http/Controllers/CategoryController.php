<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

use App\Http\Requests;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }

    public function store(Request $request){

        $this->validate($request, array(
            'name'=>'required|max:255'
        ));

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('status','Category created Successfully !!!');
        return redirect()->route('categories.index');
    }

    public function create()
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
