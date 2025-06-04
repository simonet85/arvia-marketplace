@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-xl font-bold mb-4">Liste de souhaits</h1>
    <div id="wishlist" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"></div>
</div>

<script>
    async function fetchWishlist() {
        const ids = JSON.parse(localStorage.getItem('wishlist') || '[]');
        const response = await fetch(`/api/products?ids=${ids.join(',')}`);
        const products = await response.json();

        const container = document.getElementById('wishlist');
        products.forEach(product => {
            const card = document.createElement('div');
            card.className = 'border p-4 rounded shadow-sm';
            card.innerHTML = `
                <img src="${product.image}" alt="${product.name}" class="w-full h-40 object-cover mb-2">
                <h2 class="text-lg font-semibold">${product.name}</h2>
                <p class="text-gray-600">${product.category}</p>
                <p class="text-gray-800 font-bold">$${product.price}</p>
            `;
            container.appendChild(card);
        });
    }

    fetchWishlist();
</script>
@endsection
