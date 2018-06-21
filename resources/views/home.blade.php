@extends('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
      
      <h1>Home page</h1>

      {{ $todos }}

    </div>
  </div>
</div>
@endsection