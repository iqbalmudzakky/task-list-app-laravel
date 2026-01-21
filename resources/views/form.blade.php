@section('title', isset($task) ? 'Edit Task' : 'Create New Task')

@section('content')
<!-- Back Navigation -->
<div class="mb-6">
  <a href="{{ isset($task) ? route('tasks.show', ['task' => $task->id]) : route('tasks.index') }}" class="inline-flex items-center gap-2 text-emerald-600 hover:text-emerald-700 font-medium transition-colors duration-200">
    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
    </svg>
    {{ isset($task) ? 'Back to Task' : 'Back to Tasks' }}
  </a>
</div>

<!-- Page Header -->
<div class="mb-8">
  <h2 class="text-2xl font-bold text-slate-800 mb-2">
    {{ isset($task) ? 'Edit Task' : 'Create New Task' }}
  </h2>
  <p class="text-slate-500">
    {{ isset($task) ? 'Update the details of your task below' : 'Fill in the details to create a new task' }}
  </p>
</div>

<!-- Form -->
<form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post" class="space-y-6">
  @csrf

  @isset($task)
  @method('PUT')
  @endisset

  <!-- Title Field -->
  <div>
    <label for="title" class="required">
      Task Title
      <span class="text-rose-500">*</span>
    </label>

    @error('title')
    <div class="error-message mb-3">
      <svg class="inline w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      {{ $message }}
    </div>
    @enderror

    <input
      type="text"
      id="title"
      name="title"
      value="{{ $task->title ?? old('title') }}"
      placeholder="e.g., Complete project documentation"
      @class([ 'border-rose-300 focus:ring-rose-400 focus:border-rose-300'=> $errors->has('title')
    ])
    autofocus
    >
  </div>

  <!-- Description Field -->
  <div>
    <label for="description">
      Short Description
    </label>

    @error('description')
    <div class="error-message mb-3">
      <svg class="inline w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      {{ $message }}
    </div>
    @enderror

    <textarea
      id="description"
      name="description"
      rows="3"
      placeholder="A brief description of what needs to be done..."
      @class([ 'border-rose-300 focus:ring-rose-400 focus:border-rose-300'=> $errors->has('description')
      ])
    >{{ isset($task) ? old('description', $task->description) : old('description') }}</textarea>
    <p class="text-xs text-slate-500 -mt-3 mb-4">Keep it concise - this will appear in your task list</p>
  </div>

  <!-- Long Description Field -->
  <div>
    <label for="long_description">
      Detailed Information
      <span class="text-slate-400 text-xs font-normal ml-1">(Optional)</span>
    </label>

    @error('long_description')
    <div class="error-message mb-3">
      <svg class="inline w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      {{ $message }}
    </div>
    @enderror

    <textarea
      id="long_description"
      name="long_description"
      rows="6"
      placeholder="Add any additional details, notes, or requirements..."
      @class([ 'border-rose-300 focus:ring-rose-400 focus:border-rose-300'=> $errors->has('long_description')
      ])
    >{{ $task->long_description ?? old('long_description') }}</textarea>
    <p class="text-xs text-slate-500 -mt-3 mb-4">Add comprehensive details visible on the task page</p>
  </div>

  <!-- Form Actions -->
  <div class="flex items-center gap-3 pt-6 border-t-2 border-slate-100">
    <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm hover:shadow-md bg-emerald-500 text-white hover:bg-emerald-600 focus:ring-emerald-400">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        @if(isset($task))
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        @else
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        @endif
      </svg>
      {{ isset($task) ? 'Update Task' : 'Create Task' }}
    </button>

    <a href="{{ isset($task) ? route('tasks.show', ['task' => $task->id]) : route('tasks.index') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-lg font-medium transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 shadow-sm hover:shadow-md bg-slate-200 text-slate-700 hover:bg-slate-300 focus:ring-slate-400">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
      Cancel
    </a>
  </div>

</form>
@endsection