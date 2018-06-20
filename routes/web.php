<?php

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
                ->forPage(1, 10)
                ->get();

    return $result;
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

    return $result;
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

    return $result;
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

    return $result;
});

/**
 * Get a specific todo task by id.
 */
Route::get('/todo/{id}', function($id) {
    // code to fetch todo task having id = $id
});

/**
 * Create a new todo task.
 */
Route::post('/todo', function() {
    // code to create new todo task
});

/**
 * Update a specific todo task by id.
 */
Route::put('/todo/{id}', function($id) {
    // code to update todo task having id = $id
});

/**
 * Delete a specific todo task by id.
 */
Route::delete('/todo/{id}', function($id) {
    // code to delete todo task having id = $id
});