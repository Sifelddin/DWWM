<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class postController extends Controller
{
    public function index()
    {
        $posts = [
          "mon premier titre",
         "mon douxieme titre"
        ];
       
        return view('articles', compact('posts'));
    }

    public function show($id)
    {
        $posts = [
            1 => 'mon titre n 1',
            2 => 'mon titre n 2'
        ];
        $post = $posts[$id] ?? 'pas de titre';

        return view('article', [
            'post' => $post 
        ]);
    }


    public function contact()
    {
        return view('contact');
    }
}
