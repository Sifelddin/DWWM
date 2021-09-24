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
  <textarea class="border-double-green-300" name="content" id="" cols="30" rows=""></textarea>
  
    
  </div>

 
  <button class="border-green-200" type="submit" name="submit">Submit</button>
</form>

@endsection