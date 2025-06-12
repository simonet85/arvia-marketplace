@extends('layouts.app')
@section('content')
{{-- Breadcrumbs::render('product.show', $product) --}}
{{-- Breadcrumbs::render('product.show', $product->name, $product->slug) --}}

<div class="max-w-6xl mx-auto px-4 py-10">
    <!-- Produit -->
    <div class="grid md:grid-cols-2 gap-10 items-start">
      <!-- Image -->
      <div>
        <img
          src="{{ asset('storage/' . $product->image) }}"
          alt="{{ $product->name }}"
          class="rounded-2xl shadow-lg object-cover w-full h-auto"
        />
      </div>

      <!-- Détails produit enrichis -->
      <div class="space-y-6">
        <!-- Catégorie -->
        @if ($product->category)
          <div class="text-sm uppercase tracking-wide text-gray-500 font-semibold">
            {{ strtoupper($product->category->name) }}
          </div>
        @endif

        <!-- Nom -->
        <h1 class="text-3xl font-serif font-semibold text-gray-900">{{ $product->name }}</h1>

        <!-- Évaluation -->
        <div class="flex items-center space-x-2">
          <div class="text-yellow-400 text-lg">★ ★ ★ ★ ☆</div>
          <span class="text-sm text-gray-600">(48 avis)</span>
        </div>

        <!-- Prix & stock -->
        <div class="text-2xl font-bold text-green-700">
          {{ $product->formatted_price}} CFA
        </div>
        <div class="text-sm text-gray-600">
          @if ($product->stock > 0)
            ✅ En stock ({{ $product->stock }} disponibles)
          @else
            ❌ Indisponible
          @endif
        </div>

        <!-- Description -->
        <p class="text-gray-700 leading-relaxed">
          {!! nl2br(e(strip_tags($product->description))) !!}
        </p>

        <!-- Tags -->
        @if ($product->tags && count($product->tags))
          <div class="flex flex-wrap gap-2">
            @foreach ($product->tags as $tag)
              <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm">#{{ $tag }}</span>
            @endforeach
          </div>
        @endif

        <!-- Formulaire Ajouter au panier -->
        <form action="{{ route('cart.store') }}" method="POST" class="inline-flex items-center gap-4 mt-4">
          @csrf
          <input type="hidden" name="product_id" value="{{ $product->id }}">
          @if ($product->in_stock)
          <button type="submit" class="bg-[#655b51] text-white px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-700 transition">
          {{-- !$product->in_stock ? 'disabled' : '' --}}
            <i class="fas fa-shopping-cart" title="Ajouter au panier"></i>
            Ajouter au panier
          </button>
          @endif

          <!-- <button
              x-data="{
            inWishlist: (JSON.parse(localStorage.getItem('wishlist') || '[]')).includes({{ $product->id }}),
            toggleWishlist() {
                let wishlist = JSON.parse(localStorage.getItem('wishlist') || '[]');
                if (this.inWishlist) {
              wishlist = wishlist.filter(id => id !== {{ $product->id }});
              this.inWishlist = false;
                } else {
              wishlist.push({{ $product->id }});
              this.inWishlist = true;
                }
                localStorage.setItem('wishlist', JSON.stringify(wishlist));
                window.dispatchEvent(new Event('wishlist-updated'));
            }
              }"
              :class="inWishlist ? 'bg-red-100 border-red-400' : 'bg-white border-gray-300'"
              @click="toggleWishlist"
              class="flex items-center justify-center w-8 h-8 rounded-full border hover:border-red-500 transition"
              title="Ajouter à la liste de souhaits"
          >
              <i :class="inWishlist ? 'fas fa-heart text-red-500' : 'far fa-heart text-[#655b51]'"></i>
          </button> -->
       
        </form>
        <form method="POST" action="{{ route('wishlist.toggle') }}" class="inline-flex items-center gap-4 mt-4">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <button type="submit" class="group bg-[#655b51] px-6 py-3 rounded-full text-sm font-medium transition hover:bg-gray-700 
              {{ auth()->user() && auth()->user()->wishlistItems->where('product_id', $product->id)->count() ? 'bg-red-100 border-red-400' : 'bg-white border-gray-300' }}
              " title="Ajouter à la liste de souhaits">
              <i class="far fa-heart text-[#655b51] group-hover:text-white"></i>
              Ajouter à la liste de souhaits
            </button>
        </form>

        <!-- Avantages client -->
        <ul class="text-sm text-gray-600 mt-6 space-y-1">
          <li class="flex items-center"><i class="fas fa-truck-moving text-green-500 mr-2"></i> Livraison gratuite dès 75 000 CFA</li>
          <li class="flex items-center"><i class="fas fa-undo text-blue-500 mr-2"></i> Retours possibles sous 30 jours</li>
          <li class="flex items-center"><i class="fas fa-lock text-yellow-500 mr-2"></i> Paiement 100% sécurisé</li>
        </ul>

        <!-- Partage social -->
        <div class="flex items-center gap-4 mt-6 text-gray-600">
          <span>Partager :</span>
          <a href="#" class="hover:text-blue-600"><i class="fab fa-facebook"></i></a>
          <a href="#" class="hover:text-sky-500"><i class="fab fa-twitter"></i></a>
          <a href="mailto:?subject={{ urlencode($product->name) }}&body={{ urlencode(route('products.show', $product->slug)) }}" class="hover:text-gray-800">
            <i class="fas fa-envelope"></i>
          </a>
        </div>
      </div>
    </div>


      <!-- Section ingrédients -->
      <div class="mt-16 border-t pt-10">
        <h2 class="text-2xl font-serif mb-4">Ingrédients Clés</h2>
        @if ($product->ingredients->isEmpty())
          <p class="text-gray-700">Aucun ingrédient clé n'est spécifié pour ce produit.</p>
          @else
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-700">
        @foreach ($ingredients as $ingredient)
          <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
            <h3 class="font-semibold mb-1">{{ $ingredient->name }}</h3>
            <p>{{ $ingredient->description }}</p>
          </div>
        @endforeach
        </div>
        @endif
      </div>
      <!-- Section types de peau associés au produit affichés comme tags (#name) -->
      <div class="mt-10">
        <h2 class="text-2xl font-serif mb-4">Types de Peau Associés</h2>
        @if ($product->skinTypes->isEmpty())
          <p class="text-gray-700">Aucun type de peau associé à ce produit.</p>
        @else
          <div class="flex flex-wrap gap-3">
            @foreach ($product->skinTypes as $skinType)
              <span class="bg-gray-200 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $skinType->name }}</span>
            @endforeach
          </div>
        @endif

      <!-- Produits similaires -->
      <div class="mt-16">
        <h2 class="text-2xl font-serif mb-4">Produits Similaires</h2>
        @if ($similarProducts->isNotEmpty())
          <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($similarProducts as $similarProduct)
              <a href="{{ route('products.show', $similarProduct->slug) }}" class="block group border rounded-2xl overflow-hidden hover:shadow-md transition">
                <img src="{{ asset('storage/' . $similarProduct->image) }}" alt="{{ $similarProduct->name }}" class="w-full h-48 object-cover" />
                <div class="p-3">
                  <h3 class="font-semibold text-sm">{{ $similarProduct->name }}</h3>
                  <p class="text-sm text-gray-600 mt-1">{{ $similarProduct->formatted_price }} CFA</p>
                </div>
              </a>
            @endforeach
          </div>
        @else
          <p class="text-gray-700">Aucun produit similaire n'a été trouvé.</p>
        @endif
      </div>
    </div>
@endsection
