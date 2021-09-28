@extends('layouts.app')

@section('content')
<h1>créer un nouveau post</h1>

@if ($errors->any())
  @foreach ($errors->all() as $error)
      <div class="text-red-500">{{ $error }}</div>
  @endforeach
    
@endif


<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">  
    @csrf
    <div>
    <label >Name : </label>
    <input type="text"  name="title" placeholder="entrez le titre">
  </div>
  <br>
  <div class="form-group">
    <label>description</label>
  <textarea  name="content" id="" cols="30" rows=""class="block my-2"></textarea>
  </div>
  <label for="avatar">Choose a profile picture:</label>
  <input type="file" class="block my-2"
         id="avatar" name="avatar"
         accept="image/png, image/jpeg">
  <button class="bg-green-300 rounded-lg p-1" type="submit" name="submit">Submit</button>
</form>

@endsection