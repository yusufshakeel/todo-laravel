@extends('layouts.app')

@section('title', 'Todo Laravel - Yusuf Shakeel')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
      
      <div class="my-3">
        
        @if (count($todos) > 0)

          <ul class="list-group">
          @foreach ($todos as $todo)

            <li class="list-group-item">
              <p>
                <a data-toggle="collapse" href="#collapse-id-{{ $todo->id }}">{{ $todo-> title }}</a>
              </p>
              <div class="collapse" id="collapse-id-{{ $todo->id }}">
                <div class="card card-body">
                  <div class="todo-description">{{ $todo->description }}</div>
                  <hr>
                  <p>Status: {{ $todo->status }}</p>
                  <p title="{{ $todo->created_at }}">Created: {{ $todo->created_at->diffForHumans() }}</p>
                </div>
              </div>
            </li>

          @endforeach
          </ul>

        @else
          <p class="lead">No ACTIVE todo tasks</p>
        @endif

      </div>

    </div>
  </div>
</div>
@endsection