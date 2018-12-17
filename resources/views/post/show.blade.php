@extends('layouts.main')
@section('content')

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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <input type="button" class="btn btn-primary" name="" value="edit">
        <input type="button" class="btn btn-danger" name="" value="delete">


      </td>
    </tr>
     
  </tbody>
</table>
@endsection