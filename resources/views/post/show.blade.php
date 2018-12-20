@extends('layouts.main')
@section('content')

<div class="container">
  <div class="row">
    <h1 class="text-center" style="color: green;">{{ $data->title }}</h1>
  </div>
  <div class="row">
    <img src="{{ asset('/image/'.$data->featured_img) }}">
  </div>
  <div class="row">
    <h5>{{ $data->body }}</h5>
  </div>
</div>
@endsection