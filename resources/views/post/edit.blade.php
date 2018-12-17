@extends('layouts.main')
@section('content')

<form>
	<h2 style="font-size: 50px; color: green;">Edit Posts</h2>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" placeholder="Enter Title ">
  </div>
   <div class="form-group">
    <label for="body">Body</label>
    <textarea name="content" rows="10" cols="100"></textarea>
  </div> <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="file">
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection