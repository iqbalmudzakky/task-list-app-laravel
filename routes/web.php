<?php

use App\Models\Task as TaskModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;


// $tasks = []; // Uncomment to test "no tasks" scenario

Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  return view('index', [
    // 'tasks' => ModelsTask::latest()->where('completed', true)->get() // Fetch tasks from the database by the latest created first and only completed ones
    'tasks' => TaskModel::latest()->get()
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{id}', function ($id) {
  return view('show', [
    'task' => TaskModel::findOrFail($id)
  ]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
  // dd($request->all()); // dd = dump and die, seperti console.log + stop execution
  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required',
  ]);

  $task = new TaskModel;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  $task->save();

  return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

// Route::get('/xxx', function() {
//   return 'Hello from the other side';
// })->name('hello');

// Route::get('/hallo', function() {
//   return redirect()->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//   return 'Hello, ' . $name . '!';
// });

Route::fallback(function () {
  return 'Nothing in here!';
});
