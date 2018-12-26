@extends('layouts.main')
@section('content')
<div class="row" style="padding: 10px;">
<a href="{{ route('category.create')}}"><input type="button" class="btn btn-success" name="" value="create category"></a><br>
</div>
            <table class="table table-dark">
              <thead>
                <tr>
                  <th scope="col">sn</th>
                  <th scope="col">Title</th>
                  <th scope="col">Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($data as $key=>$da)
                <tr>
                  <th scope="row">{{ ++$key }}</th>
                  <td> {{ $da->title }} </td>
                  <td>
                       <a href="{{ route('category.show',$da->id) }}"> <input type="button" class="btn btn-primary" name="" value="view">
                       </a>

                      <a href="{{ route('category.edit',$da->id) }}"><input type="button" class="btn btn-primary" name="" value="edit"></a>
                      
                       <form action="{{ route('category.delete', $da->id)}}" method="POST">
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