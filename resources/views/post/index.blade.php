@extends('layouts.main')
@section('content')
<div class="row" style="padding: 10px;">
<a href="{{ route('post.create')}}"><input type="button" class="btn btn-success" name="" value="create post"></a><br>
</div>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">sn</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Image</th>
       <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
    @foreach($data as $key=>$da)
    <tr>
      <th scope="row">{{ ++$key }}</th>
      <td> {{ $da->title }} </td>
      <td> {{ $da->body }} </td>
      <td> <img src="{{ asset('/image/'.$da->featured_img) }}"></td>
      <td>
       <a href="{{ route('post.show',$da->id) }}"> <input type="button" class="btn btn-primary" name="" value="view">
       </a>
      <a href="{{ route('post.edit',$da->id) }}"><input type="button" class="btn btn-primary" name="" value="edit"></a>
      
       <form action="{{ route('post.delete', $da->id)}}" method="POST">
        <input type="hidden" name="_method" value="DELETE">
        @csrf
         <input type="submit" class="btn btn-danger" name="" value="delete">
       </form> 


      </td>
    </tr>
     @endforeach
  </tbody>
</table>
@endsection