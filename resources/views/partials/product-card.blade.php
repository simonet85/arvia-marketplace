<div class="bg-white rounded-lg shadow-md p-4 md:p-4 mb-6 transition-transform transform hover:scale-105">
    <div class="flex justify-center">
        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/300x300?text=No+Image' }}" alt="{{ $product->name }}" class="w-full h-auto object-cover rounded-md mb-2 md:h-60" />
    </div>
    <div class="flex flex-col p-4 md:p-6">
        <h3 class="text-lg font-semibold mb-1 md:mb-2">{{ $product->name }}</h3>
        <p class="text-sm text-gray-500 mb-1 md:mb-2">{{ $product->category->name }}</p>
        <span class="p-1 text-[#493f35] font-bold">{{ number_format($product->price, 2) }} CFA</span>
        <div class="flex items-center justify-between mt-auto w-full">
            <div class="flex justify-between space-x-32 md:space-x-20">

                <form class="inline-block" action="{{ route('cart.store', [' product_id' => $product->id]) }}" method="POST">
                    @csrf
                    <button
                        class="text-sm bg-[#493f35] text-white px-6 py-2 rounded-lg hover:bg-[#3e352c] ml-auto md:ml-0"
                        type="submit"
                        title="Ajouter au panier"
                    >
                        <i class="fas fa-shopping-cart"></i> 
                    </button>
                </form>
                <a href="{{ route('products.show', $product->slug) }}" class="ml-auto md:ml-0">
                    <button class="text-sm bg-[#493f35] text-white px-6 py-2 rounded-lg hover:bg-[#3e352c]"
                        title="Détails produit"
                    >
                        <i class="fas fa-eye"></i>
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>



