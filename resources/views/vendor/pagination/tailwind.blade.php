@if ($paginator->hasPages())
<nav role="navigation" aria-label="Pagination" class="flex flex-col items-center gap-4">
    
    {{-- Pagination Buttons --}}
    <div class="flex items-center gap-1">
        
        {{-- Previous Button --}}
        @if ($paginator->onFirstPage())
            <span class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-slate-200 bg-slate-50 text-slate-300 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" 
               class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-slate-200 bg-white text-slate-600 hover:border-emerald-400 hover:text-emerald-600 hover:bg-emerald-50 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
        @endif

        {{-- Page Numbers --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="flex items-center justify-center w-10 h-10 text-slate-400 font-medium">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- Active Page --}}
                        <span class="flex items-center justify-center w-10 h-10 rounded-lg bg-emerald-500 text-white font-semibold shadow-md shadow-emerald-200">
                            {{ $page }}
                        </span>
                    @else
                        {{-- Regular Page --}}
                        <a href="{{ $url }}" 
                           class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-slate-200 bg-white text-slate-600 font-medium hover:border-emerald-400 hover:text-emerald-600 hover:bg-emerald-50 transition-all duration-200">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Button --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" 
               class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-slate-200 bg-white text-slate-600 hover:border-emerald-400 hover:text-emerald-600 hover:bg-emerald-50 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        @else
            <span class="flex items-center justify-center w-10 h-10 rounded-lg border-2 border-slate-200 bg-slate-50 text-slate-300 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </span>
        @endif
    </div>

    {{-- Results Info --}}
    <p class="text-sm text-slate-500">
        Showing 
        <span class="font-semibold text-slate-700">{{ $paginator->firstItem() ?? 0 }}</span>
        to 
        <span class="font-semibold text-slate-700">{{ $paginator->lastItem() ?? 0 }}</span>
        of 
        <span class="font-semibold text-slate-700">{{ $paginator->total() }}</span>
        results
    </p>
</nav>
@endif
