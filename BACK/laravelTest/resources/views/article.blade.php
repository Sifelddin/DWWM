@extends('layouts.app')

@section('content')
        <h4 class="m-1">{{ $post->content }}<h4>
           @if ($post->image)
           <img src="{{ Storage::url($post->image->path) }}" alt="{{ Storage::url($post->image->path) }}">
               
           @endif
             
            
               @forelse ($post->comments as $comment)
                   <span>{{ $comment->content }} | crée le {{ $comment->created_at->format('d/m/Y') }}</span><br>
                   @empty
                    <span>Aucan commentaire pour ce post.</span>
               @endforelse
               <hr>
               <h3 class="font-black">post tags :</h3>
               @forelse ($post->tags as $tag)
                   <span>{{ $tag->name }}</span>
                   @empty         
                  <span> Aucan tag pour ce post </span>
               @endforelse
            <hr>
            <h3 class="font-black">Article post :</h3>
           @if (isset($post->imageArtist->name))
                </span>{{ $post->imageArtist->name }} <span>
            @endif 
            <hr>
            <h3 class="font-black">le commentaire le plus récent :</h3>
            @if (isset($post->latestComment->id))  
            <span>{{ $post->latestComment->id }}</span>
            @endif
@endsection