<div class="bg-white rounded-lg shadow-md p-4 grid grid-cols-1 gap-4">
    <a href="{{ route('products.show', $product->id) }}" class="col-span-1">
        <!-- <img
            src="{{ asset('storage/' . $product->image) }}"
            alt="{{ $product->name }}"
            class="w-full h-60 object-cover rounded-md mb-4"
        /> -->
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-60 object-cover rounded-md mb-4" />
        @else
            <img src="https://via.placeholder.com/300x300?text=No+Image" alt="Pas d'image" class="w-full h-60 object-cover rounded-md mb-4" />
        @endif

    </a>
    <div class="col-span-1">
        <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
        <p class="text-sm text-gray-500 mb-2">{{ $product->skin_type }}</p>
        <div class="flex items-center justify-between">
            <span class="p-1 text-[#493f35] font-bold">${{ number_format($product->price, 2) }}</span>
            <form action="{{ route('cart.store', $product->id) }}" method="POST">
                @csrf
                <button
                    class="text-sm bg-[#493f35] text-white px-4 py-1 rounded-lg hover:bg-[#3e352c]"
                    type="submit"
                >
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>

