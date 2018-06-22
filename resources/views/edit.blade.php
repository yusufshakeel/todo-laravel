@extends('layouts.app')

@section('title', 'Edit - Todo Laravel - Yusuf Shakeel')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
      
      <div class="my-3">

        @if (isset($todo))

          <h3 class="text-center">Edit Todo #{{ $todo->id }}</h3>

          <form action="/todo" method="PUT">
            {{ csrf_field() }}

            <!-- Todo title -->
            <div class="form-group">
              <label for="todo-title" class="control-label">Title</label>
              <input type="text" 
                     name="todo-title" 
                     id="todo-title" 
                     class="form-control" 
                     value="{{ $todo->title }}"
                     maxlength="100" 
                     required>
            </div>

            <!-- Todo description -->
            <div class="form-group">
              <label for="todo-description" class="control-label">Description</label>
              <textarea name="todo-description" id="todo-description" class="form-control" rows="3" maxlength="5000" required>{{ $todo->description }}</textarea> 
            </div>

            <!-- Todo status -->
            <div class="form-group">
              <label for="todo-status" class="control-label">Status</label>
              <select class="form-control" id="todo-status" name="todo-status" required>
                @foreach (['ACTIVE', 'DONE', 'DELETED'] as $status)
                  @if ($status === $todo->status)
                    <option value="{{ $status }}" selected>{{ $status }}</option>
                  @else
                    <option value="{{ $status }}">{{ $status }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <p>Created: {{ $todo->created_at }}</p>
              <p>Last modified: {{ $todo->updated_at }}</p>
            </div>

            <!-- button -->
            <div class="float-right">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        @else
        <p class="text-center">Todo task does not exists!</p>
        @endif

      </div>

    </div>
  </div>
</div>
@endsection