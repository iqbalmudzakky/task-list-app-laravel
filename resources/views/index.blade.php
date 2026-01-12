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
    <li>{{ $task->title }}</li>
  @empty
      <p>No Task To-Do!</p>
  @endforelse
</div>

