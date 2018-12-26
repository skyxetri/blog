@extends('layouts.main')
@section('content')

<form action="{{ action('CategoryController@store') }}" method="POST">
	@csrf
	<h2 style="font-size: 50px; color: green;">Create Category</h2>
	@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title ">
  </div>
  
  

   
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection