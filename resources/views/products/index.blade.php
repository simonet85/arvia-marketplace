<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Catalog - Arvía</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />  
   
    @stack('styles')
  </head>
  <body class="bg-[#f9f8f4] text-gray-800">
    {{-- Navbar --}} 
    @include('partials.navbar') 
    {{-- Hero Section --}}
    <section
      class="bg-cover bg-center h-[400px] md:h-[600px] flex items-center justify-center text-center text-white relative"
    >
      <div class="bg-black bg-opacity-[0.5] p-12 rounded-md md:p-16">
        <span
          class="font-serif text-4xl md:text-6xl font-bold text-white mb-6 md:mb-12"
        >
          Nos Produits
        </span>
        <p
          class="text-white/80 max-w-3xl mx-auto leading-relaxed md:text-2xl md:leading-relaxed md:max-w-2xl"
        >
          Découvrez notre gamme de produits de beauté, soigneusement sélectionnés pour répondre à tous vos besoins. 
        </p>
      </div>
    </section>

    {{-- Search Field --}}
    @include('partials.search') 


    {{-- Main Content --}}
    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto px-4 py-8 gap-6">
      {{-- Sidebar Filters --}}
       @include('partials.sidebar') 
       
      {{-- Products Section --}}
      <main class="w-full lg:w-3/4 relative">
        {{-- Sorting & Pagination --}} 
        @include('partials.sort-pagination') 

        {{-- Spinner --}}

          <!-- Spinner -->
        <!-- <div x-show="loading" class="absolute inset-0 flex items-center justify-center bg-white bg-opacity-70 z-20">
          <i class="fas fa-spinner fa-spin text-4xl text-[#493f35]"></i>
        </div> -->

        {{--Product Grid --}}
        <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

          @php $count = count($products); @endphp
          
          @if($count === 0)
            <div class="col-span-1 text-center">
              <p class="text-gray-500">Aucun produit disponible.</p>
            </div>
          @else
            @foreach($products as $product)
                @include('partials.product-card', ['product' => $product])
            @endforeach
          @endif
        </div>
      </main>
    </div>

    {{-- Footer --}} 
      @include('partials.footer')
      <!-- include alpinejs -->
      <script src="//unpkg.com/alpinejs" defer></script>
      @stack('scripts')
  </body>
</html>


