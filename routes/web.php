<?php

use App\Models\Task as ModelTask;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


// $tasks = []; // Uncomment to test "no tasks" scenario

Route::get('/', function () {
  return redirect() -> route('tasks.index');
});

Route::get('/tasks', function ()  {
  return view('index', [
    // 'tasks' => ModelsTask::latest()->where('completed', true)->get() // Fetch tasks from the database by the latest created first and only completed ones
    'tasks'=> ModelTask::latest()->get()
  ]);
}) -> name('tasks.index');

Route::view('/tasks/create', 'create') -> name('tasks.create');

Route::get('/tasks/{id}', function ($id)  {
  return view('show', [
    'task' => ModelTask::findOrFail( $id )
  ]);
}) -> name('tasks.show');

Route::post('/tasks', function (Request $request)  {
  dd( $request->all() );
}) -> name('tasks.store');

// Route::get('/xxx', function() {
//   return 'Hello from the other side';
// }) -> name('hello');

// Route::get('/hallo', function() {
//   return redirect() -> route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//   return 'Hello, ' . $name . '!';
// });

Route::fallback(function () {
  return 'Nothing in here!';
});
