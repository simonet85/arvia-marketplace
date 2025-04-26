@if ($products->hasPages())
          <div class="flex space-x-2 items-center pagination">
                {{-- Previous Page Link --}}
                @if ($products->onFirstPage())
                    <span class="px-3 py-1 rounded-lg bg-[#e7e5e0] opacity-50 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @else
                    <a href="{{ $products->previousPageUrl() }}"
                      class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($products as $product)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($product))
                        <span class="px-3 py-1 rounded-lg bg-[#e7e5e0] cursor-default">{{ $product }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($product))
                        @foreach ($product as $page => $url)
                            @if ($page == $products->currentPage())
                                <span class="px-3 py-1 rounded-lg bg-[#493f35] text-white">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                  class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}"
                      class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @else
                    <span class="px-3 py-1 rounded-lg bg-[#e7e5e0] opacity-50 cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                @endif
            </div>
        @endif