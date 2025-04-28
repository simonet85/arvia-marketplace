
<div x-data="search()" class="flex justify-center mt-4 mb-8">
  <input
    x-model="query"
    @input="debouncedSearch()"
    type="text"
    placeholder="Search for products..."
    class="border border-gray-300 rounded-lg p-2 w-full max-w-md focus:outline-none focus:ring focus:ring-[#493f35]"
  />
  <button 
    @click="search()" 
    class="bg-[#493f35] text-white rounded-lg px-4 py-2 ml-2">
    <i class="fas fa-search"></i>
  </button>
</div>


@push('scripts')
<script>
function search() {
  return {
    query: '',
    noResults: false,
    timeout: null,
    async debouncedSearch() {
      clearTimeout(this.timeout);

      this.timeout = setTimeout(() => {
        this.search();
      }, 400); // 400ms delay
    },
    async search() {
      const params = new URLSearchParams();
      
      // Only append search if query is NOT empty
      if (this.query.trim() !== '') {
        params.append('search', this.query);
      }

      try {
        const response = await fetch(`/products/fetch?${params.toString()}`);
        const data = await response.text();

        if (data.trim() === '') {
          this.noResults = true;
          document.getElementById('product-grid').innerHTML = '';
        } else {
          this.noResults = false;
          document.getElementById('product-grid').innerHTML = data;
        }
      } catch (error) {
        console.error('Error during search:', error);
      }
    }
  };
}
</script>

@endpush