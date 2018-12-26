@extends('layouts.main')
@section('content')
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
<form action="{{ route('post.update',$data->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
	<h2 style="font-size: 50px; color: green;">Edit Posts</h2>
  
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }} ">
  </div>
   <div class="form-group">
  {!! Form::select('category',$cat,$cats,['value' => 'select category','class' => 'form-control']) !!}
  </div>

   <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" rows="10" cols="100">{{ $data->body }}</textarea>
  </div> 

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="file" name="featured_img" value="{{ $data->featured_img }}" >{{ $data->featured_img }}
  </div>
 
 
 <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection