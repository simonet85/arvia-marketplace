{{-- resources/views/wishlist.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <!-- Title -->
    <h1 class="text-3xl font-bold text-[#7a6b5f] mb-6">Wishlist</h1>

    <!-- Wishlist Items -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Example Wishlist Item -->
        <div class="bg-white shadow-md rounded overflow-hidden p-4 transition duration-300 transform hover:scale-105">
            <img src="{{ asset('images/products/sample-product.jpg') }}" alt="Product Image" class="w-full h-[200px] object-cover mb-4">
            <h4 class="font-bold mb-2">Product Name</h4>
            <p class="mb-4">$Price</p>
            <div class="flex justify-between items-center transition duration-300">
                <button class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]">Add to Cart</button>
                <button class="bg-red-500 text-white py-2 px-4 rounded-lg">Remove</button>
            </div>
        </div>
        <!-- Add more wishlist items as needed -->
    </div>
</div>
@endsection

