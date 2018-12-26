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
<form action="{{ route('category.update',$data->id) }}" method="POST">
  @csrf
	<h2 style="font-size: 50px; color: green;">Edit Category</h2>
  
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ $data->title }} ">
  </div>

    
 <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection