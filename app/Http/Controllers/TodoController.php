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

    	return $result;
    }
}
