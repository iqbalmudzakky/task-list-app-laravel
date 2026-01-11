<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return "Welcome to the Home Page!";
});

Route::get('/xxx', function() {
  return 'Hello from the other side';
}) -> name('hello');

Route::get('/hallo', function() {
  return redirect() -> route('hello');
});

Route::get('/greet/{name}', function ($name) {
  return 'Hello, ' . $name . '!';
});

Route::fallback(function () {
  return 'Nothing in here!';
});
