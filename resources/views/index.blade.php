<h1>
  Hello I'm a blade template! 
</h1>

<div>
  <!-- @if (count($tasks))
    @foreach ($tasks as $task)
      <div>{{ $task -> title }}</div>
    @endforeach
  @else
    <div>There are no tasks!</div>
  @endif -->
  @forelse ($tasks as $task)
    <div>{{ $task->title }}</div>
  @empty
      <div>No Task To-Do!</div>
  @endforelse
</div>

