@extends('layouts.app')

@section('styles')
<style>
  p {
    margin-bottom: 1rem;
  }

  .actions a {
    margin-right: 1rem;
  }
</style>
@endsection

@section('title', $task->title)

@section('content')
<p>{{ $task->description }}</p>

@if ($task->long_description)
<p>{{ $task->long_description }}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<p>{{ $task->completed ? 'Completed' : 'Not Completed' }}</p>

<div class="actions">
  <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit Task</a>
  <a href="{{ route('tasks.index') }}">Back to Tasks</a>
  <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete Task</button>
  </form>
</div>

@endsection