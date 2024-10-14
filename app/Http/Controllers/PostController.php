<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
class PostController extends Controller
{
    // home page
    public function home(){
        $posts = Post::orderBy('id', 'DESC')->paginate(4);
        return view('post.home', compact('posts'));
    }

    // show all posts
    public function index(){
        // $posts = post::all();
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('post.index',['posts'=> $posts]);
    }

    // add post
    public function create(){
        $users= User::select('id','name')->get();
        return view('post.create',compact('users'));
    }

    // store post
    public function store(Request $request)
    {
        // validate request
        $request->validate([
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
            'user_id' => ['required', 'exists:users,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif']
        ]);
    
        // Create new post
        $post = new Post();  
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $request->user_id;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }
    
        $post->save();
    
        // session flash message
        return back()->with('success', 'Post created successfully');
    }

    // delete post
    public function destroy($id){
        $post = post::find($id);
        $post->delete();
        return back()->with('delete','Post deleted successfully');
    }

    //edit post
    public function edit($id){
        $post = Post::findOrFail($id); // we can use find() but it will return null if the post is not found
        $users = User::select('id', 'name')->get();
        return view('post.edit', ['post' => $post, 'users' => $users]);
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

    // search post
    public function search(Request $request){
        $search = $request->search;
        $posts = post::where('title','like','%'.$search.'%')->paginate(10);
        return view('post.search',['posts'=>$posts]);
    }
    
}