@extends('layouts.app')

@section('styles')
<style>
  form div {
    margin-bottom: 1rem;
  }

  .error-message {
    color: red;
    font-size: 0.9rem;
    margin-top: 0.25rem;
    background-color: #ffe6e6;
    padding: 0.5rem;
  }
</style>
@endsection

@section('title', 'Edit Task')

@section('content')
<div>
  <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="post">
    @csrf
    @method('PUT')
    <div>
      <label for="title">Title:</label>
      <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}">
    </div>
    @error('title')
    <div class="error-message">{{ $message }}</div>
    @enderror

    <div>
      <label for="description">Description:</label>
      <textarea id="description" name="description" rows="5">{{ old('description', $task->description) }}</textarea>
    </div>
    @error('description')
    <div class="error-message">{{ $message }}</div>
    @enderror


    <div>
      <label for="long_description">Long Description:</label>
      <textarea id="long_description" name="long_description" rows="10">{{ old('long_description', $task->long_description) }}</textarea>
    </div>
    @error('long_description')
    <div class="error-message">{{ $message }}</div>
    @enderror


    <button type="submit">Update Task</button>
  </form>
</div>
@endsection