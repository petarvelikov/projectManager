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

Route::get('/', function () {
    return view('home');
});

Auth::routes();


Route::group(['middleware' => ['auth', 'prevent-back-history']], function() {

    Route::resource('projects', 'ProjectController');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store');

    Route::get('/tasks/{task}', function () {
        abort(404);
    });

    Route::post('/tasks/{task}', function ()
    {
        $action = $_POST["action"];
        $taskId = $_POST["task-id"];

		if ($action === "incomplete") {
			DB::table('tasks')->where('id', $taskId)->update(array('completed' => 1));
		}

		if ($action === "complete") {
			DB::table('tasks')->where('id', $taskId)->update(array('completed' => 0));
		}
    });
    Route::delete('/tasks/{task}', 'ProjectTasksController@destroy');

});
