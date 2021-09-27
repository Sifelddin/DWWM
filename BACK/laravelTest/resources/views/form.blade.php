@extends('layouts.app')

@section('content')
<h1>créer un nouveau post</h1>

<form action="{{ route('posts.store') }}" method="POST">  
    @csrf
    <div>
    <label >Name : </label>
    <input type="text"  name="title" placeholder="entrez le titre">
  </div>
  <br>
  <div class="form-group">
    <label>description</label>
  <textarea  name="content" id="" cols="30" rows=""></textarea>
  
    
  </div>

 
  <button class="bg-green-300 rounded-lg p-1" type="submit" name="submit">Submit</button>
</form>

@endsection