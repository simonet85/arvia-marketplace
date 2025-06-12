@extends('layouts.app')
@section('content')
<div class="bg-[#f9f8f4] min-h-screen" x-data="productList()" x-init="init(); fetchProducts()">
    {{-- Hero Section --}}
    <section class="bg-white py-12">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-3xl md:text-4xl font-serif font-bold text-[#493f35] mb-2">Nos Produits</h1>
            <p class="text-[#8b7d72] max-w-2xl mx-auto leading-relaxed">
                Découvrez notre collection de produits luxueux et durables conçus pour mettre en valeur votre beauté unique.
            </p>
        </div>
    </section>

    {{-- Search Field --}}
    <div class="max-w-4xl mx-auto mt-4 mb-8 px-4">
        <div class="relative">
            <input type="text" placeholder="Chercher des produits..." x-model="search" @input.debounce.500ms="fetchProducts()"
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
                    <span class="font-bold text-[#493f35]">Filtres</span>
                    <button @click="resetFilters" class="text-xs text-gray-400 hover:underline">Restaurer</button>
                </div>
                <div class="mb-6">
                    <div class="text-xs text-gray-500 uppercase mb-2">Categories</div>
                    <div class="flex flex-col gap-2">
                        <template x-for="cat in categories" :key="cat.id">
                            <label class="inline-flex items-center text-sm">
                                <input type="checkbox" class="form-checkbox text-[#493f35] mr-2"
                                    :value="cat.id"
                                    x-model="selectedCategories"
                                    @change="fetchProducts()">
                                <span x-text="cat.name"></span>
                            </label>
                        </template>
                    </div>
                </div>
                <!-- skin types filter -->
                <div class="mb-6">
                    <div class="text-xs text-gray-500 uppercase mb-2">Types de peau</div>
                    <select x-model="selectedSkinTypes" @change="fetchProducts()"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-[#493f35]">
                        <option value="">Toutes les peaux</option>
                        <template x-for="type in skinTypes" :key="type.id">
                            <option :value="type.id" x-text="type.name"></option>
                        </template>
                    </select>
                </div>
                <div class="mb-6">
                    <div class="text-xs text-gray-500 uppercase mb-2">Prix</div>
                    <input type="range" min="100" max="10000" step="100" x-model="priceRange" @input="fetchProducts()" class="w-full accent-[#493f35]">
                    <div class="flex justify-between text-xs mt-1">
                        <!-- <span>1.000 CFA</span> -->
                       <span x-text="Number(priceRange).toLocaleString('fr-FR') + ' CFA'"></span>
                        <!-- <span>10.000 CFA</span> -->
                    </div>
                </div>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="w-full lg:w-3/4">
            <div class="flex justify-between items-center mb-4">
                <div class="text-sm text-gray-500" x-text="`${products.length} products trouvés`"></div>
                <select x-model="sortBy" @change="fetchProducts()"
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-[#493f35]">
                    <option value="" selected>Trier par</option>
                    <option value="featured">En vedette</option>
                    <option value="price_asc">Prix: Bas → Élevé</option>
                    <option value="price_desc">Prix: Élevé → Bas</option>
                    <option value="newest">Nouveaux</option>
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
                        <p class="text-gray-500 text-lg">Aucun produit trouvé.</p>
                    </div>
                </template>
                <template x-for="product in products" :key="product.id">
                    <div class="bg-white rounded-lg shadow p-4 flex flex-col relative group min-h-[340px]">
                        <template x-if="product.bestseller">
                            <span class="absolute top-4 left-4 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded">Bestseller</span>
                        </template>
                        <img :src="product.image_url ?  product.image_url : 'https://via.placeholder.com/300x300?text=No+Image'"
                             :alt="product.name"
                             class="w-full h-48 object-cover rounded-md mb-4 bg-gray-50" />
                        <div class="text-xs text-[#bfae9e] uppercase font-semibold mb-1" x-text="product.category?.name ?? 'Category'"></div>
                        <div class="font-bold text-base text-[#493f35] mb-1" x-text="product.name"></div>
                        <div class="flex items-center text-yellow-500 text-xs mb-1">
                            <span class="mr-1">&#9733;</span>
                            <span x-text="product.average_rating ?? 4.8"></span>
                            <span class="ml-2 text-gray-400" x-text="`(${product.reviews_count ?? 0} revues)`"></span>
                        </div>
                        <div class="text-[#493f35] font-bold mb-1" x-text="`${product.formatted_price} CFA`"></div>
                        <div class="flex gap-2 mt-auto">

                        <button
                            class="bg-[#493f35] text-white px-4 py-2 rounded hover:bg-[#655b51] transition text-sm flex-1"
                            :class="{ 'opacity-50 cursor-not-allowed': !product.in_stock }"
                            :disabled="!product.in_stock || addingToCartId === product.id"
                            @click.prevent="addToCart(product)"
                        >
                            <span x-show="addingToCartId !== product.id">Ajouter </span>
                            <span x-show="addingToCartId === product.id"> 
                                <i class="fas fa-spinner fa-spin"></i>  
                            </span>
                        </button>

                        <a :href="`/products/${product.slug}`"
                            class="bg-white border border-[#493f35] text-[#493f35] px-4 py-2 rounded hover:bg-[#493f35] hover:text-white transition text-sm flex-1 text-center">
                            Voir détails
                        </a>

                        </div>
                    </div>
                </template>
            </section>
            {{-- Pagination --}}
            <div class="flex justify-center mt-8" x-show="pagination.links && pagination.links.length > 3">
                <nav aria-label="Pagination">
                    <ul class="inline-flex">
                    <template x-for="link in pagination.links" :key="link.label">
                        <li>
                            <a href="#"
                            :class="{
                                'px-3 py-2 rounded text-sm font-medium': true,
                                'bg-[#493f35] text-white': link.active,
                                'text-gray-500 hover:bg-gray-50': !link.active
                            }"
                            x-html="link.label
                                .replace('Next &raquo;', 'Suivant &raquo;')
                                .replace('&laquo; Previous', '&laquo; Précédent')
                                .replace('Next', 'Suivant')
                                .replace('Previous', 'Précédent')"
                            @click.prevent="goToPage(link.url)">
                            </a>
                        </li>
                    </template>
                    </ul>
                </nav>
            </div>
        </main>

        <!-- Modale de connexion requise -->
        <div
            x-show="showModal"
            x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
            style="display: none;"
            id="login-modal"
        >
            <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full text-center">
                <div class="text-xl font-bold mb-4 text-[#493f35]">Connexion requise</div>
                <div class="mb-6 text-gray-700" x-text="modalMessage"></div>
                <a href="/login" class="inline-block bg-[#493f35] text-white px-6 py-2 rounded hover:bg-[#655b51] transition">Se connecter</a>
                <button @click="showModal = false" class="ml-4 text-gray-500 hover:underline">Fermer</button>
            </div>
        </div>
        <!-- Toast Notification -->
        <div
            x-show="toastVisible"
            x-transition
            :class="toastType === 'error' ? 'bg-red-600' : 'bg-green-600'"
            class="fixed top-6 right-6 z-50 text-white px-6 py-3 rounded shadow-lg"
            x-text="toastMessage"
            style="display: none;"
            id="toast"
        ></div>
    </div>
</div>
<script>
function productList() {
    return {
        products: [],
        categories: [],
        skinTypes: [],
        pagination: { links : [] },
        currentPage: 1,
        search: '',
        selectedCategories: [],
        selectedSkinTypes: '',
        priceRange: 10000, // Default max price
        sortBy: '',
        addingToCartId: null,
        loading: false,
        showModal: false,
        modalMessage: '',
        toastVisible: false,
        toastMessage: '',
        toastType: 'success',
        toastTimeout: null,

        fetchProducts(pageUrl = null) {
            this.loading = true;
            let url = pageUrl ?? `/admin/products/json?search=${this.search}&category=${this.selectedCategories.join(',')}&sort_by=${this.sortBy}&price_max=${this.priceRange}&skin_type=${this.selectedSkinTypes}`;
            fetch(url)
            .then(res => res.json())
            .then(data => {
                this.products = data.data ?? data;
                console.log('Fetching products :', this.products);
                    this.pagination = data;
                    this.loading = false;
                });
        },
        goToPage(url){
            if(url){
                this.fetchProducts(url);
                window.scrollTo({top:0, behavior: 'smooth'});
            }
        },
        addToCart(product) {
           this.addingToCartId = product.id;
            fetch('/cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ product_id: product.id })
            })
            .then(async res => {
                if(res.status === 401 || res.status === 419 || res.status === 302) {
                    this.showLoginModal();
                    this.addingToCartId = null;
                    return;
                }
                let data = await res.json();
                if(data.success){
                    this.showToast('Produit ajouté au panier !', 'success');
                }else{
                    this.showToast(data.message || 'Echec de l\'ajout.', 'error');
                }
                this.addingToCartId = null;
            })
            .catch(() => {
                this.showToast('Erreur réseau ou serveur.', 'error');
                this.addingToCartId = null;
            });
        },
        showToast(message, type = 'success') {
            this.toastMessage = message;
            this.toastType = type;
            this.toastVisible = true;
            clearTimeout(this.toastTimeout);
            this.toastTimeout = setTimeout(() => {
                this.toastVisible = false;
            }, 3000);
        },
        showLoginModal(message = 'Veuillez vous connecter pour continuer.') {
            this.modalMessage = message;
            this.showModal = true;
        },
        resetFilters() {
            this.search = '';
            this.selectedCategories = [];
            this.priceRange = 1000;
            this.sortBy = '';
            this.fetchProducts();
        },
        init() {
            fetch('/admin/categories/json')
                .then(res => res.json())
                .then(data => { this.categories = data; });

            fetch('/admin/skintypes/json')
                .then(res => res.json())
                .then(data => { this.skinTypes = data; });
        }
    }
}
</script>
@endsection