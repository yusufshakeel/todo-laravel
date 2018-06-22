@extends('layouts.app')

@section('title', 'Done -Todo Laravel - Yusuf Shakeel')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
      
      <div class="my-3">

        <p class="my-3 text-center">DONE</p>
        
        @if (count($todos) > 0)

          <ul class="list-group">
          @foreach ($todos as $todo)

            <li class="list-group-item">
              <div>
                <a data-toggle="collapse" href="#collapse-id-{{ $todo->id }}">{{ $todo->title }}</a>
                <div class="btn-group btn-group-sm float-right" role="group" aria-label="Basic example">
                  <a href='/todo/{{ $todo->id }}' 
                     class="btn btn-secondary"><i class="fa fa-pencil"></i></a>
                  <button
                    class="btn btn-secondary todo-delete-btn"
                    data-id="{{ $todo->id }}"><i class="fa fa-trash"></i></button>
                </div>
              </div>
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
          <p class="lead">No DONE todo tasks</p>
        @endif

      </div>

      <!-- nav -->
      <div class="my-3">
        <!-- prev button -->
        @if ($page > 1)
          <a href="/todo/done/{{ $page - 1 }}" class="btn btn-primary">Prev</a>
        @endif

        <!-- next button -->
        @if (count($todos) === 10)
          <a href="/todo/done/{{ $page + 1 }}" class="btn btn-primary float-right">Next</a>
        @endif
      </div>
      <!-- nav ends here -->

    </div>
  </div>
</div>
@endsection