@extends('layouts.app')

@section('content')

@if ($posts->count() > 0)
@foreach ($posts as $post)        
<pre><h3><a href="{{ route('posts.show', ['id'=> $post->id] ) }}">{{ $post->title }}</a></h3></pre>
@endforeach
 
@else
        <span>Aucan post en base de donnée</span>
@endif

    

@endsection