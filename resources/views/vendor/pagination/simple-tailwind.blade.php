@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center mt-8">
        <div class="flex space-x-2 items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1 rounded-lg bg-[#e7e5e0] opacity-50 cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">
                    <i class="fas fa-chevron-left"></i>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-3 py-1 rounded-lg bg-[#e7e5e0] cursor-default">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1 rounded-lg bg-[#493f35] text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="px-3 py-1 rounded-lg bg-[#e7e5e0] opacity-50 cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
