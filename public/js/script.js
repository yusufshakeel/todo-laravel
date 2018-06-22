$(function(){

  // handle delete button click
  $('body').on('click', '.todo-delete-btn', function(e) {
    e.preventDefault();

    // get the id of the todo task
    var id = $(this).attr('data-id');

    // get csrf token value
    var csrf_token = $('meta[name="csrf-token"]').attr('content');

    // now make the ajax request
    $.ajax({
      'url': '/todo/' + id,
      'type': 'DELETE',
      headers: { 'X-CSRF-TOKEN': csrf_token }
    }).done(function() {
      console.log('Todo task deleted: ' + id);
      window.location = window.location.href;
    }).fail(function() {
      alert('something went wrong!');
    });

  });

});