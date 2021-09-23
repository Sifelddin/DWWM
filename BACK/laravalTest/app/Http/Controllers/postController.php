<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
       $posts = Post::all();
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
}
