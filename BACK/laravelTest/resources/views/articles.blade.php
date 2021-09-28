@extends('layouts.app')

@section('content')

@if ($posts->count() > 0)
@foreach ($posts as $post)        
<pre><h3 class="m-1 hover:text-gray-500"><a href="{{ route('posts.show', ['id'=> $post->id] ) }}">{{ $post->title }}</a></h3></pre>
@endforeach
 
@else
        <span>Aucan post en base de donnée</span>
@endif

<h1>Liste des vidéos </h1>
<h4 class="m-1">{{ $video->title }}<h4>
           @forelse ($video->comments as $comment)
               <span>{{ $comment->content }} | crée le {{ $comment->created_at->format('d/m/Y') }}</span><br>
               @empty
                <span>Aucan commentaire pour ce post.</span>
           @endforelse
@endsection