@extends('layouts.app')
@section('content')
<div class="bg-[#f9f8f4] min-h-screen" x-data="productList()" x-init="fetchProducts()">
    {{-- Hero Section --}}
    <section class="bg-white py-12">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-serif font-bold text-[#493f35] mb-2">Our Products</h1>
            <p class="text-[#8b7d72] max-w-2xl mx-auto leading-relaxed">
                Discover our collection of luxurious cosmetics, designed to enhance your natural beauty.
            </p>
        </div>
    </section>

    {{-- Search Field --}}
    <div class="max-w-4xl mx-auto mt-4 mb-8 px-4">
        <div class="relative">
            <input type="text" placeholder="Search products..." x-model="search" @input.debounce.500ms="fetchProducts"
                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#493f35] transition" />
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[#493f35]">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto px-4 py-8 gap-6">
        {{-- Sidebar Filters --}}
        <aside class="w-full lg:w-1/4 flex-shrink-0 mb-6 lg:mb-0">
            <div class="bg-white rounded-lg shadow p-6 sticky top-24">
                <div class="flex items-center justify-between mb-4">
                    <span class="font-bold text-[#493f35]">Filters</span>
                    <button @click="resetFilters" class="text-xs text-gray-400 hover:underline">Reset</button>
                </div>
                <div class="mb-6">
                    <div class="text-xs text-gray-500 uppercase mb-2">Categories</div>
                    <div class="flex flex-col gap-2">
                        <template x-for="cat in categories" :key="cat.id">
                            <label class="inline-flex items-center text-sm">
                                <input type="checkbox" class="form-checkbox text-[#493f35] mr-2"
                                    :value="cat.id"
                                    x-model="selectedCategories"
                                    @change="fetchProducts">
                                <span x-text="cat.name"></span>
                            </label>
                        </template>
                    </div>
                </div>
                <div class="mb-6">
                    <div class="text-xs text-gray-500 uppercase mb-2">Price Range</div>
                    <input type="range" min="0" max="100" x-model="priceRange" @input="fetchProducts" class="w-full accent-[#493f35]">
                    <div class="flex justify-between text-xs mt-1">
                        <span>$0</span><span>$100</span>
                    </div>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="w-full lg:w-3/4">
            <div class="flex justify-between items-center mb-4">
                <div class="text-sm text-gray-500" x-text="`Showing ${products.length} products`"></div>
                <select x-model="sortBy" @change="fetchProducts"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-[#493f35]">
                    <option value="featured">Featured</option>
                    <option value="price_asc">Price: Low to High</option>
                    <option value="price_desc">Price: High to Low</option>
                    <option value="newest">Newest</option>
                </select>
            </div>
            <section id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 min-h-[340px]">
                <template x-if="loading">
                    <div class="col-span-full flex justify-center items-center py-16">
                        <i class="fas fa-spinner fa-spin text-4xl text-[#493f35]"></i>
                    </div>
                </template>
                <template x-if="!loading && products.length === 0">
                    <div class="col-span-full text-center py-16 bg-white rounded shadow">
                        <p class="text-gray-500 text-lg">No products available for this filter.</p>
                    </div>
                </template>
                <template x-for="product in products" :key="product.id">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col relative group min-h-[340px]">
                        <template x-if="product.bestseller">
                            <span class="absolute top-4 left-4 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded">Bestseller</span>
                        </template>
                        <img :src="product.image_url ? '/storage/' + product.image_url : 'https://via.placeholder.com/300x300?text=No+Image'"
                             :alt="product.name"
                             class="w-full h-48 object-cover rounded-md mb-4 bg-gray-50" />
                        <div class="text-xs text-[#bfae9e] uppercase font-semibold mb-1" x-text="product.category?.name ?? 'Category'"></div>
                        <div class="font-bold text-base text-[#493f35] mb-1" x-text="product.name"></div>
                        <div class="flex items-center text-yellow-500 text-xs mb-1">
                            <span class="mr-1">&#9733;</span>
                            <span x-text="product.average_rating ?? 4.8"></span>
                            <span class="ml-2 text-gray-400" x-text="`(${product.reviews_count ?? 0} reviews)`"></span>
                        </div>
                        <div class="text-[#493f35] font-bold mb-1" x-text="`$${product.price}`"></div>
                        <div class="flex gap-2 mt-auto">
                            <button class="bg-[#493f35] text-white px-4 py-2 rounded hover:bg-[#655b51] transition text-sm flex-1"
                                    :disabled="!product.in_stock">Add to Cart</button>
                            <a :href="`/products/${product.slug}`"
                               class="bg-white border border-[#493f35] text-[#493f35] px-4 py-2 rounded hover:bg-[#493f35] hover:text-white transition text-sm flex-1 text-center">View Details</a>
                        </div>
                    </div>
                </template>
            </section>
            {{-- Pagination (à adapter si tu veux paginer côté front) --}}
        </main>
    </div>
</div>

<script>
function productList() {
    return {
        products: [],
        categories: [],
        search: '',
        selectedCategories: [],
        priceRange: 100,
        sortBy: 'featured',
        loading: false,
        fetchProducts() {
            this.loading = true;
            fetch(`/products/json?search=${this.search}&category=${this.selectedCategories.join(',')}&sort_by=${this.sortBy}&price_max=${this.priceRange}`)
                .then(res => res.json())
                .then(data => {
                    this.products = data.data ?? data; // paginate or not
                    this.loading = false;
                });
        },
        resetFilters() {
            this.search = '';
            this.selectedCategories = [];
            this.priceRange = 100;
            this.sortBy = 'featured';
            this.fetchProducts();
        },
        init() {
            // Charger les catégories (tu peux aussi les passer du contrôleur)
            fetch('/api/categories')
                .then(res => res.json())
                .then(data => { this.categories = data; });
        }
    }
}
</script>
@endsection