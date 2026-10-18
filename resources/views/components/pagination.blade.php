@if ($paginator->hasPages())
    <nav class="flex items-center justify-between" aria-label="Pagination">
        {{-- Info --}}
        <div class="text-sm text-gray-400">
            Showing
            <span class="font-semibold text-white">{{ $paginator->firstItem() }}</span>
            –
            <span class="font-semibold text-white">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-semibold text-white">{{ $paginator->total() }}</span>
            results
        </div>

        {{-- Page links --}}
        <div class="flex items-center gap-x-1">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 rounded-xl bg-white/5 text-gray-600 text-sm cursor-not-allowed">
                    ← Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-sm font-medium transition-colors duration-200">
                    ← Prev
                </a>
            @endif

            {{-- Page numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-3 py-2 text-gray-500 text-sm">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 rounded-xl bg-blue-700 text-white text-sm font-bold">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-sm font-medium transition-colors duration-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-4 py-2 rounded-xl bg-white/10 hover:bg-white/20 text-sm font-medium transition-colors duration-200">
                    Next →
                </a>
            @else
                <span class="px-4 py-2 rounded-xl bg-white/5 text-gray-600 text-sm cursor-not-allowed">
                    Next →
                </span>
            @endif
        </div>
    </nav>
@endif
