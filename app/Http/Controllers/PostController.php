<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
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
    public function edit(){

    }
}
