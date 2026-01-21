@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
<!-- Action Bar -->
<div class="flex items-center justify-between mb-6 pb-4 border-b-2 border-slate-100">
  <div>
    <h2 class="text-lg font-semibold text-slate-700">All Tasks</h2>
    <p class="text-sm text-slate-500 mt-0.5">
      {{ $tasks->total() }} {{ Str::plural('task', $tasks->total()) }} total
    </p>
  </div>
  <a href="{{ route('tasks.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm hover:shadow-md bg-emerald-500 text-white hover:bg-emerald-600 focus:ring-emerald-400">
    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
    </svg>
    New Task
  </a>
</div>

<!-- Task List -->
<div class="space-y-3">
  @forelse ($tasks as $task)
  <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
    class="bg-white rounded-lg border-2 border-slate-200 hover:border-emerald-300 hover:shadow-md transition-all duration-200 ease-in-out block p-4 group">
    <div class="flex items-start gap-4">
      <!-- Status Indicator -->
      <div class="shrink-0 mt-1">
        @if($task->completed)
        <div class="w-6 h-6 rounded-full bg-emerald-100 border-2 border-emerald-500 flex items-center justify-center">
          <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        @else
        <div class="w-6 h-6 rounded-full border-2 border-slate-300 group-hover:border-emerald-400 transition-colors"></div>
        @endif
      </div>

      <!-- Task Content -->
      <div class="flex-1 min-w-0">
        <h3 @class([ 'font-semibold text-slate-800 group-hover:text-emerald-600 transition-colors' , 'line-through text-slate-400 group-hover:text-slate-500'=> $task->completed
          ])>
          {{ $task->title }}
        </h3>

        @if($task->description)
        <p class="text-sm text-slate-500 mt-1 line-clamp-2">
          {{ $task->description }}
        </p>
        @endif

        <div class="flex items-center gap-3 mt-2 text-xs text-slate-400">
          <span class="flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $task->created_at->diffForHumans() }}
          </span>
          @if($task->completed)
          <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 rounded-full font-medium">
            Completed
          </span>
          @endif
        </div>
      </div>

      <!-- Arrow Icon -->
      <div class="shrink-0">
        <svg class="w-5 h-5 text-slate-300 group-hover:text-emerald-500 group-hover:translate-x-1 transition-all" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
      </div>
    </div>
  </a>
  @empty
  <!-- Empty State -->
  <div class="text-center py-16">
    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-slate-100 mb-4">
      <svg class="w-8 h-8 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
      </svg>
    </div>
    <h3 class="text-lg font-semibold text-slate-700 mb-2">No tasks yet</h3>
    <p class="text-slate-500 mb-6">Get started by creating your first task</p>
    <a href="{{ route('tasks.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm hover:shadow-md bg-emerald-500 text-white hover:bg-emerald-600 focus:ring-emerald-400">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
      Create Your First Task
    </a>
  </div>
  @endforelse
</div>

<!-- Pagination -->
@if ($tasks->count())
<div class="mt-8 pt-6 border-t-2 border-slate-100">
  {{ $tasks->links() }}
</div>
@endif

@endsection