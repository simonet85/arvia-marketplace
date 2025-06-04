<aside x-data="filters()" class="lg:w-64  bg-white shadow-md rounded-lg p-6">

    <h2 class="text-xl font-bold mb-4">Filters</h2>

    {{-- Category Filter --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Catégories</h3>
        <ul class="space-y-2" id="category-filters">
            @foreach(['Skin Care', 'Makeup', 'Perfume', 'Hair Care'] as $category)
                <li>
                    <label class="flex items-center">
                        <input 
                            type="checkbox" 
                            value="{{ $category }}" 
                            class="form-checkbox text-[#493f35] mr-2"
                            @change="updateFilters"
                            x-model="selectedCategories"
                        >
                        {{ $category }}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- Price Range Filter --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Fourchette de prix</h3>
        <div class="relative mb-2">
            <input 
                type="range" 
                min="0" 
                max="10000" 
                step="10"
                x-model="priceRange"
                @input="updateFilters"
                class="w-full accent-[#493f35]"
            >
        </div>
        <div class="flex justify-between text-sm mt-1">
            <span>1000 CFA</span>
            <span x-text=" priceRange + ' CFA'"></span>
        </div>
    </div>


    {{-- Skin Type Filter --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Type de peau</h3>
        <select 
            id="skin-type" 
            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-[#493f35]"
            x-model="skinType"
            @change="updateFilters"
        >
            <option value="">Tous les types</option>
            <option value="Dry Skin">Peau sèche</option>
            <option value="Oily Skin">Peau grasse</option>
            <option value="Sensitive Skin">Peau sensible</option>
        </select>
    </div>

    {{-- Bestsellers --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Meilleures ventes</h3>
        <label class="flex items-center">
            <input 
                type="checkbox" 
                class="form-checkbox text-[#493f35] mr-2"
                x-model="bestseller"
                @change="updateFilters"
            >
            Produits plus vendus
        </label>
    </div>

    {{-- Populars --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Produits populaires</h3>
        <label class="flex items-center">
            <input 
                type="checkbox" 
                class="form-checkbox text-[#493f35] mr-2"
                x-model="populars"
                @change="updateFilters"
            >
            Produits populaires
        </label>
    </div>

    {{-- New Arrivals --}}
    <div>
        <h3 class="font-semibold mb-2">Nouveaux produits</h3>
        <label class="flex items-center">
            <input 
                type="checkbox" 
                class="form-checkbox text-[#493f35] mr-2"
                x-model="newest"
                @change="updateFilters"
            >
            Nouveaux produits
        </label>
    </div>
</aside>

@push('scripts')
<script>
function filters() {
    return {
        selectedCategories: [],
        priceRange: 10000,
        skinType: '',
        bestseller: false,
        populars: false,
        newest: false,
        loading: false,  // <-- ADD THIS

        async updateFilters() {
            const params = new URLSearchParams();

            if (this.selectedCategories.length) {
                params.append('categories', this.selectedCategories.join(','));
            }
            if (this.priceRange !== 10000) {
                params.append('price', this.priceRange);
            }
            if (this.skinType) {
                params.append('skin_type', this.skinType);
            }
            if (this.bestseller) {
                params.append('bestseller', '1');
            }
            if (this.populars) {
                params.append('popular', '1');
            }
            if (this.newest) {
                params.append('newest', '1');
            }

            try {
                this.loading = true; // 👉 Start spinner
                
                const response = await fetch(`/products/fetch?${params.toString()}`);
                const html = await response.text();
                
                const grid = document.getElementById('product-grid');
                grid.innerHTML = html.trim();

                if (!grid.innerHTML.trim()) {
                    grid.innerHTML = `
                        <div class="col-span-full text-center py-20">
                            <p class="text-gray-500 text-xl">Aucun produit trouvé.</p>
                        </div>
                    `;
                }
            } catch (error) {
                console.error('Erreur lors du filtrage des produits', error);
            } finally {
                this.loading = false; // 👉 Stop spinner
            }
        }
    }
}

</script>
@endpush
