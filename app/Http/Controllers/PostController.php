<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // show all posts
    public function index(){
        return view('post.index');
    }

    // add post
    public function create(){
        return view('post.create');
    }

    // delete post
    public function destroy(){

    }

    //edit post
    public function edit(){

    }
}
