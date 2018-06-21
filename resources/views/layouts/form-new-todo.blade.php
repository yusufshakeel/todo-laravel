<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-6 offset-sm-3 col-md-6 offset-md-3 my-3">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New</button>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Todo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- form -->
        <form action="/todo" method="POST">
          {{ csrf_field() }}

          <!-- Todo title -->
          <div class="form-group">
            <label for="todo-title" class="control-label">Title</label>
            <input type="text" name="todo-title" id="todo-title" class="form-control" required>
          </div>

          <!-- Todo description -->
          <div class="form-group">
            <label for="todo-description" class="control-label">Description</label>
            <textarea name="todo-description" id="todo-description" class="form-control" rows="3" required></textarea> 
          </div>

          <!-- button -->
          <div class="float-right">
            <button type="reset" class="btn btn-secondary">Reset</button>
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</div>