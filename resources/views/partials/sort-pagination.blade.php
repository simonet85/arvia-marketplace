<!-- partials/sort-pagination.blade.php -->

<div x-data="sortingAndPagination()" class="flex justify-between items-center bg-white shadow-md rounded-lg p-4 mb-6">
  
  <!-- Dropdown de Tri -->
  <select
    x-model="sort"
    @change="updateProducts()"
    class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-[#493f35]"
  >
    <option value="">Tri par: Défaut</option>
    <option value="price-asc">Prix: Bas vers Élevé</option>
    <option value="price-desc">Prix: Élevé vers Bas</option>
    <option value="newest">Nouveauté</option>
    <option value="popular">Populaire</option>
  </select>

  <!-- Pagination Dynamique -->
  <div class="flex space-x-2 items-center">
    <template x-for="pageNumber in totalPages" :key="pageNumber">
      <button
        @click="goToPage(pageNumber)"
        :class="{
          'bg-[#493f35] text-white': pageNumber === currentPage,
          'bg-[#e7e5e0] hover:bg-[#d6d4d0]': pageNumber !== currentPage
        }"
        class="px-3 py-1 rounded-lg"
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

