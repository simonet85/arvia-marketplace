@extends('layouts.app')
@section('content')
<div class="bg-[#f9f6f2] min-h-screen py-10">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-bold mb-2 text-[#493f35]">Ma Liste de souhaits</h1>
        <p class="mb-8 text-gray-500">{{ $wishlist->count() }} articles enregistrés</p>

        <div class="space-y-6">
            @forelse($wishlist as $product)
            <div class="bg-white rounded-lg shadow-sm flex items-center px-6 py-5 relative border border-gray-100">
                <!-- Remove button -->
                <form method="POST" action="{{ route('wishlist.toggle') }}" class="absolute top-3 left-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="text-gray-400 hover:text-red-500 text-lg">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
                <!-- Product image -->
                
                <img src="{{ $product->image_url ? $product->image_url : 'https://via.placeholder.com/80x80?text=No+Image' }}"
                     alt="{{ $product->name }}"
                     class="w-20 h-20 object-cover rounded-md border mr-6" />
                <!-- Product info -->
                <div class="flex-1">
                    <div class="text-xs text-[#bfae9e] uppercase font-semibold mb-1">
                        {{ $product->category->name ?? 'SKINCARE' }}
                    </div>
                    <div class="font-bold text-lg text-[#493f35]">{{ $product->name }}</div>
                    <div class="text-gray-500 text-sm mb-1">{{ Str::limit($product->description, 70) }}</div>
                    <div class="flex items-center text-yellow-500 text-sm mb-1">
                        <span class="mr-1">&#9733;</span>
                        <span>{{ number_format($product->average_rating ?? 4.5, 1) }}</span>
                        <span class="ml-2 text-gray-400">({{ $product->reviews_count ?? 100 }} revues)</span>
                    </div>
                </div>
                <!-- Price & actions -->
                <div class="flex flex-col items-end min-w-[120px]">
                    <div class="font-bold text-lg text-[#493f35] mb-1">
                        {{ $product->formatted_price ?? number_format($product->price, 2) }} CFA
                    </div>
                    @if(isset($product->old_price) && $product->old_price > $product->price)
                        <div class="text-xs text-gray-400 line-through mb-1">
                            {{ number_format($product->old_price, 2) }} CFA
                        </div>
                    @endif
                    <div class="text-xs mb-2 {{ $product->in_stock ? 'text-green-600' : 'text-red-500' }}">
                        {{ $product->in_stock ? 'En stock' : 'Stock indisponible' }}
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit"
                                class="bg-[#493f35] text-white px-4 py-2 rounded flex items-center gap-2 hover:bg-[#655b51] transition text-sm disabled:opacity-50"
                                {{ !$product->in_stock ? 'disabled' : '' }}>
                                <i class="fas fa-shopping-cart"></i>
                                Ajouter au panier
                            </button>
                        </form>
                        <a href="{{ route('products.show', $product->slug) }}"
                           class="bg-white border border-[#493f35] text-[#493f35] px-4 py-2 rounded flex items-center gap-2 hover:bg-[#493f35] hover:text-white transition text-sm">
                            <i class="fas fa-eye"></i>
                            Voir le produit
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center text-gray-400 py-16">
               Ma list
            </div>
            @endforelse
        </div>

        <div class="flex justify-center mt-10">
            <a href="{{ route('products.index') }}"
               class="bg-white border border-[#493f35] text-[#493f35] px-6 py-2 rounded hover:bg-[#493f35] hover:text-white transition">
                Continuez vos achats
            </a>
        </div>
    </div>
</div>
@endsection