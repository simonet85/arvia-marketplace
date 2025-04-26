<div
    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
    >
    <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
        <a href="{{ route('products.show', $product->id) }}">
        <img
            src="{{ $product->image }}"
            alt="{{ $product->name }}"
            class="w-full h-60 object-cover rounded-md mb-4"
        />
        <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
        <p class="text-sm text-gray-500 mb-2">{{ $product->skin_type }}</p>
        <div class="flex items-center">
            <span class="p-1 text-[#493f35] font-bold">${{ number_format($product->price, 2) }}</span>
        </a>
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