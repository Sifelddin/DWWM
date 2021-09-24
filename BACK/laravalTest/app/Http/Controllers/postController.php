<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
    // $post = Post::find(12);
    //    $post->update([
    //        'title' => 'titre idité'
    //    ]);
    //    $post->delete();
    //    dd("titre idité");
       $posts = Post::orderBy('title')->get();
        return view('articles', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
 
        return view('article', [
            'post' => $post 
        ]);
    }

    public function create()
    {
        return view('form');
    }

    public function contact()
    {
        return view('contact');
    }
    public function store(Request $request)
    {
        // $post = new Post();
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();

        Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);
     
        dd('post créé !');
    }
}
