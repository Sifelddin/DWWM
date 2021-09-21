@extends('layouts.app')

@section('content')

@foreach ($posts as $post)
        <h3>{{ $post }}</h3>
@endforeach
    

@endsection