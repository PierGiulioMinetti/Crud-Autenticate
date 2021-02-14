<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // POST ARCHIVE
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('guest.posts.index', compact('posts'));
    }

    //  DETAIL / SHOW
    public function show($slug){
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $post = Post::where('slug', $slug)->first();

        if(empty($post)){
            abort(404);
        }


        return view('guest.posts.show', compact('post'));
    }


}
