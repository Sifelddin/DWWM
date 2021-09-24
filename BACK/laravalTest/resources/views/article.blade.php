@extends('layouts.app')

@section('content')
        <h4>{{ $post->content }}<h4>
               @foreach ($post->comments as $comment)
                   <span>{{ $comment->content }}</span>
               @endforeach
@endsection