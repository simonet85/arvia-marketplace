@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto p-4">
      <h1 class="text-3xl md:text-4xl font-serif text-center mb-8">
        Nos Catégories
      </h1>

      <!-- Barre de recherche -->
      <div class="mb-6 max-w-3xl mx-auto">
        <input
          type="text"
          id="searchInput"
          placeholder="Rechercher une catégorie..."
          class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-300"
        />
      </div>

      <!-- Filtres -->
      <div
        class="mb-6 max-w-4xl mx-auto flex flex-wrap items-center justify-between gap-4"
      >
        <div class="flex gap-4 flex-wrap">
          <select
            id="filterType"
            class="p-2 rounded-md border border-gray-300 shadow-sm"
          >
            <option value="">Tous les types</option>
            <option value="visage">Soin du Visage</option>
            <option value="corps">Soin du Corps</option>
            <option value="cheveux">Soin des Cheveux</option>
            <option value="complements">Compléments Alimentaires</option>
          </select>

          <select
            id="filterIngredient"
            class="p-2 rounded-md border border-gray-300 shadow-sm"
          >
            <option value="">Tous les ingrédients</option>
            <option value="aloe">Aloe Vera</option>
            <option value="argan">Huile d’Argan</option>
            <option value="karité">Beurre de Karité</option>
          </select>
        </div>

        <button
          id="resetFilters"
          class="px-4 py-2 bg-gray-100 text-sm rounded-full hover:bg-gray-200 transition"
        >
          Réinitialiser les filtres
        </button>
      </div>

      <!-- Grille des catégories -->
      <div
        id="categoryGrid"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
      >
        <!-- Carte 1 -->
        <a
          href="categorie-soin-du-visage.html"
          data-type="visage"
          data-ingredient="aloe"
          data-category="Soin du Visage"
          class="group block border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="https://source.unsplash.com/400x300/?face,skincare"
            alt="Soin du Visage"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-serif mb-1">Soin du Visage</h2>
            <p class="text-sm text-gray-600">
              Nettoyants, sérums et crèmes hydratantes.
            </p>
          </div>
        </a>

        <!-- Carte 2 -->
        <a
          href="categorie-soin-du-corps.html"
          data-type="corps"
          data-ingredient="karité"
          data-category="Soin du Corps"
          class="group block border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="https://source.unsplash.com/400x300/?body,lotion"
            alt="Soin du Corps"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-serif mb-1">Soin du Corps</h2>
            <p class="text-sm text-gray-600">
              Gommages, laits corporels et huiles naturelles.
            </p>
          </div>
        </a>

        <!-- Carte 3 -->
        <a
          href="categorie-soin-des-cheveux.html"
          data-type="cheveux"
          data-ingredient="argan"
          data-category="Soin des Cheveux"
          class="group block border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="https://source.unsplash.com/400x300/?hair,care"
            alt="Soin des Cheveux"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-serif mb-1">Soin des Cheveux</h2>
            <p class="text-sm text-gray-600">
              Shampooings, soins capillaires et huiles naturelles.
            </p>
          </div>
        </a>

        <!-- Carte 4 -->
        <a
          href="categorie-complements-alimentaires.html"
          data-type="complements"
          data-ingredient="aloe"
          data-category="Compléments Alimentaires"
          class="group block border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="https://source.unsplash.com/400x300/?vitamins,wellness"
            alt="Compléments Alimentaires"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-serif mb-1">Compléments Alimentaires</h2>
            <p class="text-sm text-gray-600">
              Bien-être intérieur pour une beauté extérieure.
            </p>
          </div>
        </a>

        <!-- Carte 5 -->
        <a
          href="categorie-soin-des-ongles.html"
          data-type="ongles"
          data-ingredient="karité"
          data-category="Soin des Ongles"
          class="group block border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="https://source.unsplash.com/400x300/?nails,manicure"
            alt="Soin des Ongles"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-xl font-serif mb-1">Soin des Ongles</h2>
            <p class="text-sm text-gray-600">
              Vernis, soins et accessoires pour des ongles parfaits.
            </p>
          </div>
        </a>
      </div>
    </div>

@include('partials.footer')
    <!-- JS Recherche + Filtres -->
    <script>
      const searchInput = document.getElementById("searchInput");
      const filterType = document.getElementById("filterType");
      const filterIngredient = document.getElementById("filterIngredient");
      const resetFilters = document.getElementById("resetFilters");
      const cards = document.querySelectorAll("[data-category]");

      function filterCards() {
        const search = searchInput.value.toLowerCase();
        const selectedType = filterType.value;
        const selectedIngredient = filterIngredient.value;

        cards.forEach((card) => {
          const name = card.dataset.category.toLowerCase();
          const cardType = card.dataset.type;
          const cardIngredient = card.dataset.ingredient;

          const matchSearch = name.includes(search);
          const matchType = !selectedType || cardType === selectedType;
          const matchIngredient =
            !selectedIngredient || cardIngredient === selectedIngredient;

          card.style.display =
            matchSearch && matchType && matchIngredient ? "block" : "none";
        });
      }

      searchInput.addEventListener("input", filterCards);
      filterType.addEventListener("change", filterCards);
      filterIngredient.addEventListener("change", filterCards);

      resetFilters.addEventListener("click", () => {
        searchInput.value = "";
        filterType.value = "";
        filterIngredient.value = "";
        cards.forEach((card) => (card.style.display = "block"));
      });
    </script>
@endsection
