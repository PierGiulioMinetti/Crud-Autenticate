<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // PRENDIAMO SOLO I POST DELL'UTENTE AUTENTICATO TRAMITE ID
        $posts = Post::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // GET DATA FROM FORM
        $data = $request->all();

        // VALIDATION
        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);

        // GET ACTIVE USER(FOREIGN KEY LOGGED)
        $data['user_id'] = Auth::id();

        // SLUG
        $data['slug'] = Str::slug($data['title'], '-');

        // CREATE POST
        $newPost = new Post();

        // MASS ASSIGNMENT
        $newPost->fill($data); //fillable in model

        // SAVE
        $saved = $newPost->save();

        // CHECK IF SAVED
        if($saved) {
            return redirect()->route('admin.posts.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        /**
         *  $post = Post::find($id); --> equivalente a Post $post sopra
         */

        // GET DATA
        $data = $request->all();

        // VALIDATION
        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);

        // UPDATE SLUG IF TITLE CHANGE
        $data['slug'] = Str::slug($data['title'], '-');

        $updated = $post->update($data); //--> fillable

        // REDIRECT
        if($updated){
            return redirect()->route('posts.show', $post->slug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
