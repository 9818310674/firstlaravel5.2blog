<?php

namespace App\Http\Controllers;

use App\Post;

use App\Http\Controllers\Controller;

use Session;

use App\Tag;

use Illuminate\Http\Request;

use App\Category;

use App\Http\Requests;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $posts = Post::paginate(5);

        return view('posts.index')->withPost($posts);
    }


    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }


    public function store(Request $request)
    {
        //validate the data
        $this->validate($request,array(
            'title' => 'required|max:225',
            'slug' => 'required|alpha_dash|min:5|max:225|unique:posts,slug',
            'category'=>'required|integer',
            'body' => 'required',
              ));
        //store in the database

        $post = new Post;
        $post->title = $request->title;
        $post->category_id=$request->category;
        $post->body = $request->body;
        $post->slug = $request->slug;

        $post->save();
        $post->tags()->sync($request->tags,false);

        session()->flash('status','The blog post was successfully save !');

        return redirect()->route('posts.show', $post->id);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    public function edit($id)
    {
        $categories = Category::all();
        $cats = [];
        foreach ($categories as $category){
            $cats[$category->id]= $category->name;
        }
        $tags = Tag::all();

        $post = Post::find($id);
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id); 
        if ($request->input('slug') == $post->slug) {
            $this->validate($request,array(
            'title' => 'required|max:225',
            'category_id'=>'required|integer',
            'body' => 'required',
              ));
        }
        else{
         $this->validate($request,array(
            'title' => 'required|max:225',
            'category_id'=>'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:225|unique:posts,slug',
            'body' => 'required',
              ));
        }

         $post = Post::find($id);
         $post->category_id = $request->input('category_id');
         $post->title = $request->input('title');
         $post->slug = $request->input('slug');
         $post->body = $request->input('body');

         $post->save();
         if($request->input('tags')) {
             $post->tags()->sync($request->input('tags'));
         }
         else{
             $post->tags()->sync(array());
         }

         Session::flash('status','This post was successfully updated.');
         return redirect()->route('posts.show', $post->id);

    }

    public function destroy($id)
    {
        //
        $post = POST::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('status','The post was successfully deleted');
        return redirect()->route('posts.index');
    }
}
