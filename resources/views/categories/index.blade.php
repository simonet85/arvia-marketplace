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
        <div class="mb-6 max-w-4xl mx-auto flex flex-wrap items-center justify-between gap-4">
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
            @foreach ($categories as $category)
            <a
                href="{{route('categories.show', ['slug' => $category->slug])}}"
                data-type="{{ $category->type }}"
                data-ingredient="{{ $category->ingredient }}"
                data-category="{{ $category->name }}"
                class="group block border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
            >
                <img
                    src="{{ $category->image_url }}"
                    alt="{{ $category->name }}"
                    class="h-48 w-full object-cover"
                />
                <div class="p-4">
                    <h2 class="text-xl font-serif mb-1">{{ $category->name }}</h2>
                    <p class="text-sm text-gray-600">
                        {{Str::limit($category->description, 100, '...')}}
                    </p>
                </div>
            </a>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex space-x-2 justify-center mt-8">
            {{ $categories->links('vendor.pagination.custom') }}
        </div>
    </div>

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

