<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task as TaskModel;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
  return view('index', [
    'tasks' => TaskModel::latest()->get()
  ]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (TaskModel $task) {
  return view('edit', [
    'task' => $task
  ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (TaskModel $task) {
  return view('show', [
    'task' => $task
  ]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
  $task = TaskModel::create($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (TaskRequest $request, TaskModel $task) {
  $task->update($request->validated());

  return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::fallback(function () {
  return 'Nothing in here!';
});
