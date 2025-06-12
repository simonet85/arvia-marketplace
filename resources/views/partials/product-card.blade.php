<div class="bg-white rounded-lg shadow-sm flex flex-col p-4 relative group transition hover:shadow-lg min-h-[350px]">
    {{-- Badge --}}
    @if(isset($product->is_bestseller) && $product->is_bestseller)
        <span class="absolute top-4 left-4 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded">Bestseller</span>
    @elseif(isset($product->is_new) && $product->is_new)
        <span class="absolute top-4 left-4 bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded">New</span>
    @endif

    {{-- Image --}}
    {{-- dd($product->image_url); --}}
    <img src="{{ $product->image_url ? $product->image_url : 'https://via.placeholder.com/300x300?text=No+Image' }}"
            alt="{{ $product->name }}"
            class="w-full h-48 object-cover rounded-md mb-4 bg-gray-50" />

    {{-- Category --}}
    <div class="text-xs text-[#bfae9e] uppercase font-semibold mb-1">
        {{ $product->category->name ?? 'Category' }}
    </div>
    {{-- Name --}}
    <div class="font-bold text-lg text-[#493f35] mb-1">{{ $product->name }}</div>
    {{-- Price --}}
    <div class="flex items-center gap-2 mb-1">
        <span class="text-[#493f35] font-bold text-base">
            {{ $product->formatted_price ?? number_format($product->price, 2) }} CFA
        </span>
        @if(isset($product->old_price) && $product->old_price > $product->price)
            <span class="text-xs text-gray-400 line-through">
                {{ number_format($product->old_price, 2, ',', ' ') }} CFA
            </span>
        @endif
    </div>
    {{-- Rating --}}
    <div class="flex items-center text-yellow-500 text-sm mb-2">
        <span class="mr-1">&#9733;</span>
        <span>{{ number_format($product->average_rating ?? 4.5, 1, ',', '.') }}</span>
        <span class="ml-2 text-gray-400">({{ $product->reviews_count ?? 100 }})</span>
    </div>
    {{-- Actions --}}
    <div class="flex gap-2 mt-auto">
        <form action="{{ route('cart.store') }}" method="POST" class="flex-1">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit"
                class="w-full bg-[#493f35] text-white px-4 py-2 rounded hover:bg-[#655b51] transition text-sm flex items-center justify-center gap-2 disabled:opacity-50"
                @if(!$product->in_stock) disabled @endif
            >
                <i class="fas fa-shopping-cart"></i>
                Add to Cart
            </button>
        </form>
        <a href="{{ route('products.show', $product->slug) }}"
            class="bg-white border border-[#493f35] text-[#493f35] px-4 py-2 rounded hover:bg-[#493f35] hover:text-white transition text-sm flex items-center gap-2">
            View Details
        </a>
    </div>
</div>