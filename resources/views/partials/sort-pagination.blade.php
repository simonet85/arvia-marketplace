<!-- partials/sort-pagination.blade.php -->
{{-- Sorting and Pagination Component --}}
{{-- This component handles sorting and pagination for product listings --}}
<div 
  x-data="sortingAndPagination()" 
  class="flex flex-col md:flex-row md:justify-between md:items-center gap-4 bg-white shadow-md rounded-lg p-4 mb-6 max-w-3xl mx-auto"
>
  <!-- Dropdown de Tri -->
  <div class="flex items-center gap-2">
    <label for="sort" class="text-sm font-medium text-gray-700">Trier par :</label>
    <select
      id="sort"
      x-model="sort"
      @change="updateProducts()"
      class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#493f35] transition"
    >
      <option value="">Défaut</option>
      <option value="price-asc">Prix: Bas → Élevé</option>
      <option value="price-desc">Prix: Élevé → Bas</option>
      <option value="newest">Nouveauté</option>
      <option value="popular">Populaire</option>
    </select>
  </div>
  <!-- Pagination Dynamique -->
  <div class="flex flex-wrap gap-2 items-center justify-center">
    <template x-for="pageNumber in totalPages" :key="pageNumber">
      <button
        @click="goToPage(pageNumber)"
        :class="{
          'bg-[#493f35] text-white shadow': pageNumber === currentPage,
          'bg-[#e7e5e0] text-[#493f35] hover:bg-[#d6d4d0]': pageNumber !== currentPage
        }"
        class="px-3 py-1 rounded-lg font-semibold transition-colors duration-150"
        x-text="pageNumber"
      ></button>
    </template>
  </div>
</div>

@push('scripts')
<script>
function sortingAndPagination() {
    const urlParams = new URLSearchParams(window.location.search);
    return {
        sort: urlParams.get('sort') || '',
        currentPage: parseInt(urlParams.get('page')) || 1,
        totalPages: 5, // <-- Replace with dynamic total pages later
        loading: true, 

        updateProducts() {
            this.currentPage = 1;
            this.fetchProducts();
        },

        goToPage(pageNumber) {
            this.currentPage = pageNumber;
            this.fetchProducts();
        },

        async fetchProducts() {
            try {
                const response = await fetch(`/products/fetch?${new URLSearchParams({
                    sort: this.sort,
                    page: this.currentPage
                }).toString()}`);
                const html = await response.text();
                
                // Update only the product grid
                document.getElementById('product-grid').innerHTML = html;
            } catch (error) {
                console.error('Erreur de chargement des produits', error);
            }
        },
    //     updateUrl() {
    // const params = new URLSearchParams({
    //     sort: this.sort,
    //     page: this.currentPage
    // });
    // window.history.pushState({}, '', `/products?${params.toString()}`);
    // }
}
}
</script>
@endpush

