<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
	public function getTodoById($id)
    {
    	$todo = new Todo();

    	$result = $todo->find($id);

    	// return $result;
    	return view('edit', ['todo' => $result]);
    }

    public function updateTodoById($id, Request $request)
    {
    	// $request['id'] = $id;
    	// return $request;

    	// validate
	    $validatedData = $request->validate([
	        'todo-title' => 'required|max:100',
	        'todo-description' => 'required|max:5000',
	        'todo-status' => 'required'
	    ]);

	    // find
	    $todo = Todo::find($id);

        // set data
	    if (isset($request['todo-title'])) {
	        $todo->title = $request['todo-title'];
	    }
	    if (isset($request['todo-description'])) {
	        $todo->description = $request['todo-description'];
	    }
	    if (isset($request['todo-status'])) {
	        $todo->status = $request['todo-status'];
	    }

	    // update
	    $todo->update();

	    // redirect to todo/id page
	    return redirect('/todo/' . $id);
    }

    public function deleteTodoById($id)
    {
    	// find task
    	$todo = Todo::find($id);

    	// delete
    	$todo->delete();
    }

}
