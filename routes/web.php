<?php

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

Route::get('/', function() {
    // code to fetch todo tasks
});

Route::get('/todo/page/{page?}', function($page = 1) {
    // code to fetch the todo tasks on page = $page
});

Route::get('/todo/{id}', function($id) {
    // code to fetch todo task having id = $id
});

Route::post('/todo', function() {
    // code to create new todo task
});

Route::put('/todo/{id}', function($id) {
    // code to update todo task having id = $id
});

Route::delete('/todo/{id}', function($id) {
    // code to delete todo task having id = $id
});