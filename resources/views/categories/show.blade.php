@extends('layouts.app')

@section('content')
<main>
  {{-- dd($category) --}}
  {{-- dd($products) --}}
      <!-- Header -->
      <header class="bg-[#f9f7f5] py-16">
        <div class="container mx-auto px-6 md:px-12">
          <h1 class="text-3xl font-serif text-center mb-6">{{ $category->name }}</h1>
        </div>
      </header>
      
      @if ($products->count() === 0)
        <p class="text-center text-2xl text-gray-600">Aucun produit dans cette catégorie</p>
      @else
        <!-- Filtres -->
        <section class="px-4 md:px-12 py-8 max-w-7xl mx-auto">
          <div class="flex flex-col sm:flex-row gap-4 mb-6 justify-center">
            <select
              id="filterType"
              class="border border-gray-300 rounded-md p-2 text-sm w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-black"
            >
              <option value="">Filtrer par type</option>
              <option value="shampooing">Shampooing</option>
              <option value="soin">Soin</option>
              <option value="masque">Masque</option>
              <option value="traitement">Traitement</option>
            </select>
  
            <select
              id="filterIngredient"
              class="border border-gray-300 rounded-md p-2 text-sm w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-black"
            >
              <option value="">Filtrer par ingrédient</option>
              <option value="huile_de_coconut">Huile de Coco</option>
              <option value="huile_d_argane">Huile d'Argane</option>
              <option value="huile_de_jojoba">Huile de Jojoba</option>
              <option value="protéines_de_soja">Protéines de Soja</option>
            </select>
  
            <button
              id="resetFilters"
              class="bg-gray-200 text-sm px-4 py-2 rounded hover:bg-gray-300 transition w-full sm:w-auto"
            >
              Réinitialiser
            </button>
          </div>
  
          <!-- Produits -->
          <div
            id="products"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
          >
            <!-- Example Product -->
             @foreach ($products as $product)
            <div
              data-type="shampooing"
              data-ingredient="huile_de_coconut"
              class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
            >
              <img
                src="{{ $product->image_url }}"
                alt="{{ $product->name }}"
                class="h-48 w-full object-cover"
              />
              <div class="p-4">
                <h2 class="text-lg font-serif mb-1">{{ $product->name }}</h2>
                <p class="text-sm text-gray-600 mb-2">
                 {{-- Str::limit($product->description, 100) --}}
                 {!! Str::limit(strip_tags($product->description),100) !!}
                </p>
              {{-- Boutons actions --}}
              <div class="flex justify-between items-center gap-2">
                <form action="{{ route('cart.store', $product->id) }}" method="POST">
                  @csrf
                  <button class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51] transition">
                    <i class="fas fa-shopping-cart" title="Ajouter au panier"></i>
                  </button>
                </form>
                <a href="{{ route('products.show', $product->slug) }}" class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51] transition">
                  <i class="fas fa-eye" title="Voir le produit"></i>
                </a>
              </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- Add a button that direct us to the category index page -->
          <div class="mt-8 text-center">
            <a
              href="{{ url('categories') }}"
              class="bg-gray-200 text-sm px-4 py-2 rounded hover:bg-gray-300 transition"
            >
              Voir toutes les catégories
            </a>
          </div>
        </section>
      @endif

    </main>

    <!-- JS : Filtres -->
    <script>
      const typeFilter = document.getElementById("filterType");
      const ingFilter = document.getElementById("filterIngredient");
      const resetBtn = document.getElementById("resetFilters");
      const products = document.querySelectorAll(".product-card");

      function filterProducts() {
        const type = typeFilter.value;
        const ing = ingFilter.value;

        products.forEach((product) => {
          const typeMatch = type === "" || product.dataset.type === type;
          const ingMatch = ing === "" || product.dataset.ingredient === ing;

          if (typeMatch && ingMatch) {
            product.style.display = "block";
          } else {
            product.style.display = "none";
          }
        });
      }

      typeFilter.addEventListener("change", filterProducts);
      ingFilter.addEventListener("change", filterProducts);
      resetBtn.addEventListener("click", () => {
        typeFilter.value = "";
        ingFilter.value = "";
        filterProducts();
      });
    </script>
@endsection

