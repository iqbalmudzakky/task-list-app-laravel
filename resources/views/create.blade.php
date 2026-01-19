@extends('layouts.app')
  
@section('title', 'Create New Task')

@section('content')
  <div>
    <form action="{{ route('tasks.store') }}" method="post">
      @csrf
      <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
      </div>

      <div>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5"></textarea>
      </div>

      <div>
        <label for="long_description">Long Description:</label>
        <textarea id="long_description" name="long_description" rows="10"></textarea>
      </div>
      
      <button type="submit">Create Task</button>
    </form>
  </div>
@endsection