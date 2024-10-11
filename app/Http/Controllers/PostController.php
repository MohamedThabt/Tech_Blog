<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    // home page
    public function home(){
        $posts = post::all();
        return view('post.home',['posts'=>$posts]);
    }

    // show all posts
    public function index(){
        $posts = post::all();
        return view('post.index',['posts'=> $posts]);
    }

    // add post
    public function create(){
        return view('post.create');
    }

    // store post
    public function store(Request $request){
        // validate request
        $request->validate([
            'title' => ['required','string','min:3','max:255'],
            'description' => ['required','string','min:10','max:500'],
            'user' => ['required','exists:users,name']
        ]);
        // insertion into database
        $post = new post();  
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = 1;
        $post->save();
        // session flash message
        return back()->with('success','Post created successfully');
    }

    // delete post
    public function destroy($id){
        $post = post::find($id);
        $post->delete();
        return back()->with('delete','Post deleted successfully');
    }

    //edit post
    public function edit($id){
        $post = post::findOrFail($id);// we can use find() but it will return null if the post is not found
        return view('post.edit',['post'=>$post]);
    }

    // update post
    public function update(Request $request,$id){
        $post = post::findOrFail($id);
        // $post->update($request->all());
        //or
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    // show post
    public function show($id){
        $post = post::findOrFail($id);
        return view('post.show',['post'=>$post]);
    }
}
