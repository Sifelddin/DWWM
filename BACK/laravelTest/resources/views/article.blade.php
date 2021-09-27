@extends('layouts.app')

@section('content')
        <h4 class="m-1">{{ $post->content }}<h4>
            <span>{{ $post->image ? $post->image->path : "pas d'image" }}</span><br>
               @forelse ($post->comments as $comment)
                   <span>{{ $comment->com_content }} | crée le {{ $comment->created_at->format('d/m/Y') }}</span><br>
                   @empty
                    <span>Aucan commentaire pour ce post.</span>
               @endforelse
               <hr>
               @forelse ($post->tags as $tag)
                   <span>{{ $tag->name }}</span>
                   @empty         
                  <span> Aucan tag pour ce post </span>
               @endforelse

@endsection