@extends('layouts.app')

@section('title', $task->title)

@section('content')
<!-- Back Navigation -->
<div class="mb-6">
  <a href="{{ route('tasks.index') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium transition-colors duration-200">
    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    Back to Tasks
  </a>
</div>

<!-- Task Header -->
<div class="mb-6 pb-6 border-b-2 border-slate-100">
  <div class="flex items-start justify-between gap-4 mb-4">
    <div class="flex items-start gap-3 flex-1">
      <!-- Status Icon -->
      @if($task->completed)
      <div class="w-8 h-8 rounded-full bg-emerald-100 border-2 border-emerald-500 flex items-center justify-center shrink-0 mt-1">
        <svg class="w-5 h-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      @else
      <div class="w-8 h-8 rounded-full border-2 border-slate-300 shrink-0 mt-1"></div>
      @endif

      <!-- Title -->
      <div>
        <h2 class="text-2xl font-bold text-slate-800 leading-tight">{{ $task->title }}</h2>
        <div class="flex items-center gap-2 mt-2">
          <span @class([ 'inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-sm font-semibold' , 'bg-emerald-100 text-emerald-700'=> $task->completed,
            'bg-amber-100 text-amber-700' => !$task->completed
            ])>
            @if($task->completed)
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Completed
            @else
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            In Progress
            @endif
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Task Details -->
<div class="space-y-6 mb-8">
  @if($task->description)
  <div>
    <h3 class="text-sm font-semibold text-slate-600 uppercase tracking-wide mb-2">Description</h3>
    <p class="text-slate-700 leading-relaxed bg-slate-50 p-4 rounded-lg border border-slate-200">
      {{ $task->description }}
    </p>
  </div>
  @endif

  @if($task->long_description)
  <div>
    <h3 class="text-sm font-semibold text-slate-600 uppercase tracking-wide mb-2">Additional Details</h3>
    <p class="text-slate-700 leading-relaxed bg-slate-50 p-4 rounded-lg border border-slate-200 whitespace-pre-wrap">
      {{ $task->long_description }}
    </p>
  </div>
  @endif

  <!-- Metadata -->
  <div class="bg-slate-50 rounded-lg p-4 border border-slate-200">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <div class="flex items-center gap-2 text-slate-500 text-sm mb-1">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <span class="font-medium">Created</span>
        </div>
        <p class="text-slate-700 text-sm">{{ $task->created_at->format('M d, Y \a\t g:i A') }}</p>
        <p class="text-slate-500 text-xs mt-0.5">{{ $task->created_at->diffForHumans() }}</p>
      </div>

      <div>
        <div class="flex items-center gap-2 text-slate-500 text-sm mb-1">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
          <span class="font-medium">Last Updated</span>
        </div>
        <p class="text-slate-700 text-sm">{{ $task->updated_at->format('M d, Y \a\t g:i A') }}</p>
        <p class="text-slate-500 text-xs mt-0.5">{{ $task->updated_at->diffForHumans() }}</p>
      </div>
    </div>
  </div>
</div>

<!-- Action Buttons -->
<div class="flex flex-wrap items-center gap-3 pt-6 border-t-2 border-slate-100">
  <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm hover:shadow-md bg-emerald-500 text-white hover:bg-emerald-600 focus:ring-emerald-400">
    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
    </svg>
    Edit Task
  </a>

  <form action="{{ route('tasks.toggle', ['task' => $task->id]) }}" method="POST" class="inline-block">
    @csrf
    @method('PATCH')
    <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 bg-transparent border-2 border-slate-300 text-slate-600 hover:border-slate-400 hover:bg-slate-50 focus:ring-slate-400">
      @if($task->completed)
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
      </svg>
      Mark as Incomplete
      @else
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      Mark as Complete
      @endif
    </button>
  </form>

  <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST" class="inline-block ml-auto" x-data>
    @csrf
    @method('DELETE')
    <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm hover:shadow-md bg-rose-500 text-white hover:bg-rose-600 focus:ring-rose-400">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
      </svg>
      Delete Task
    </button>
  </form>
</div>

@endsection