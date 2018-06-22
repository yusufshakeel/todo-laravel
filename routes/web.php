<?php

use Illuminate\Http\Request;
use App\Todo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/**
 * Get the ACTIVE todo tasks.
 */
Route::get('/', function() {
    $todo = new Todo();

    $result = $todo
                ->where('status', '=', 'ACTIVE')
                ->orderBy('created_at', 'DESC')
                ->forPage(1, 10)
                ->get();

    // return $result;
    return view('home', ['todos' => $result]);
});

/**
 * Get the ACTIVE todo tasks for a given page.
 */
Route::get('/todo/active/{page?}', function($page = 1) {
    $todo = new Todo();

    $result = $todo
                ->where('status', '=', 'ACTIVE')
                ->forPage($page, 10)
                ->get();

    // return $result;
    return view('active', ['todos' => $result, 'page' => $page]);
});

/**
 * Get the DONE todo tasks for a given page.
 */
Route::get('/todo/done/{page?}', function($page = 1) {
    $todo = new Todo();

    $result = $todo
                ->where('status', '=', 'DONE')
                ->forPage($page, 10)
                ->get();

    // return $result;
    return view('done', ['todos' => $result, 'page' => $page]);
});

/**
 * Get the DELETED todo tasks for a given page.
 */
Route::get('/todo/deleted/{page?}', function($page = 1) {
    $todo = new Todo();

    $result = $todo
                ->where('status', '=', 'DELETED')
                ->forPage($page, 10)
                ->get();

    // return $result;
    return view('deleted', ['todos' => $result, 'page' => $page]);
});

/**
 * Get a specific todo task by id.
 */
Route::get('/todo/{id}', 'TodoController@getTodoById');


/**
 * Create a new todo task.
 */
Route::post('/todo', function(Request $request) {

    // validate
    $validator = Validator::make($request->all(), [
        'todo-title' => 'required|max:100',
        'todo-description' => 'required|max:5000',
    ]);

    // if error
    if ($validator->fails()) {
        return 'Error in submitted data.';
    }

    // now create new todo
    $todo = new Todo();

    if (isset($request['todo-title'])) {
        $todo->title = $request['todo-title'];
    }
    if (isset($request['todo-description'])) {
        $todo->description = $request['todo-description'];
    }

    // now save
    $todo->save();

    // redirect to home
    return redirect('/');

});

/**
 * Update a specific todo task by id.
 */
Route::put('/todo/{id}', 'TodoController@updateTodoById');

/**
 * Delete a specific todo task by id.
 */
Route::delete('/todo/{id}', function($id) {
    return array('id' => $id);
});