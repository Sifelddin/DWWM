<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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
        $video = Video::find(1);
        $posts = Post::all();
        //return view('articles', compact('posts','video'));
        return view('articles',[
            'posts' => $posts,
            'video' => $video
        ]);
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
        $request->validate([
           // 'required|max:255|min:5|unique:posts'
            'title' => ['required','max:255','min:5','unique:posts'],
            'content' => 'required'
        ]);
        $path = Storage::disk('public')->put('avatars', $request->avatar);
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content
        ]);  
        $image = new Image();
        $image->path = $path;
        $post->image()->save($image);
        return Redirect::to('/');
    }
    public function register()
    {
        $post = Post::find(10);
        $video = Video::find(1);
        $comment1 = new Comment(['content' => 'Mon premier commentaire']);
        $comment2 = new Comment(['content' => 'Mon deuxième commentaire']);
        $comment3 = new Comment(['content' => 'Mon troisième commentaire']);
        $video->comments()->save($comment3);
        $post->comments()->saveMany([
            $comment1,$comment2
        ]);
    }
}
