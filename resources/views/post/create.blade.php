@extends('layouts.main')
@section('content')

<form action="{{ action('PostController@store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<h2 style="font-size: 50px; color: green;">Create Posts</h2>
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
  <div class="form-group">
  {!! Form::select('category',$cat,null,['placeholder' => 'select category','class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" rows="10" cols="100"></textarea>
  </div>

   <div class="form-group">
    <label for="image">Image</label>
    <input type="file" name="featured_img" class="form-control" id="file">
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection