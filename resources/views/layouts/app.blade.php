<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Task List') • Productivity Hub</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <script src="//unpkg.com/alpinejs" defer></script>

  <style>
    /* Simple CSS without @apply for Tailwind CDN compatibility */
    label {
      display: block;
      font-size: 0.875rem;
      font-weight: 600;
      color: #334155;
      margin-bottom: 0.5rem;
      letter-spacing: 0.025em;
    }

    input,
    textarea {
      width: 100%;
      border: 2px solid #e2e8f0;
      border-radius: 0.5rem;
      padding: 0.75rem 1rem;
      margin-bottom: 1rem;
      color: #1e293b;
      background-color: white;
      box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      transition: all 200ms ease-in-out;
    }

    input::placeholder,
    textarea::placeholder {
      color: #94a3b8;
    }

    input:focus,
    textarea:focus {
      outline: none;
      border-color: transparent;
      box-shadow: 0 0 0 2px #34d399;
    }

    textarea {
      resize: vertical;
    }

    form div {
      margin-bottom: 1.25rem;
    }

    .error-message {
      color: #be123c;
      font-size: 0.875rem;
      font-weight: 500;
      margin-top: 0.25rem;
      background-color: #fef2f2;
      padding: 0.5rem 0.75rem;
      border-radius: 0.5rem;
      border: 1px solid #fecdd3;
    }
  </style>

  @yield('styles')
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100">
  <div class="container mx-auto px-4 py-8 lg:py-12 max-w-4xl">

    <!-- Header -->
    <header class="mb-8 text-center">
      <h1 class="text-4xl font-bold text-slate-800 mb-2 tracking-tight">
        @yield('title', 'Task List')
      </h1>
      <p class="text-slate-500 text-sm">Stay organized, stay productive</p>
    </header>

    <!-- Main Content Card -->
    <main class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
      <div class="p-6 lg:p-8">

        <!-- Flash Messages -->
        <div x-data="{ show: true }">
          @if (session()->has('success'))
          <div class="relative bg-emerald-50 mb-6 p-4 rounded-xl border-2 border-emerald-200"
            x-show="show"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform scale-95"
            x-transition:enter-end="opacity-100 transform scale-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform scale-100"
            x-transition:leave-end="opacity-0 transform scale-95">
            <div class="flex items-start gap-3">
              <!-- Success Icon -->
              <svg class="w-6 h-6 text-emerald-600 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <div class="flex-1">
                <strong class="block text-emerald-900 font-semibold text-sm">Success!</strong>
                <p class="text-emerald-700 text-sm mt-0.5">{{ session('success') }}</p>
              </div>
              <!-- Close Button -->
              <button @click="show = false" class="text-emerald-600 hover:text-emerald-800 transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          @endif
        </div>

        <!-- Page Content -->
        @yield('content')
      </div>
    </main>

    <!-- Footer -->
    <footer class="mt-8 text-center text-slate-400 text-sm">
      <p>Built with Laravel & Tailwind CSS</p>
    </footer>
  </div>
</body>

</html>