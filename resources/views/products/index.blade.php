<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Catalog - Arvía</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />

    @stack('styles')
  </head>
  <body class="bg-[#f9f8f4] text-gray-800">
    {{-- Navbar --}} @include('partials.navbar') {{-- Hero Section --}}
    <section
      class="bg-cover bg-center h-[400px] md:h-[600px] flex items-center justify-center text-center text-white relative"
    >
      <div class="bg-black bg-opacity-[0.5] p-12 rounded-md md:p-16">
        <span
          class="font-serif text-4xl md:text-6xl font-bold text-white mb-6 md:mb-12"
        >
          Our Products
        </span>
        <p
          class="text-white/80 max-w-3xl mx-auto leading-relaxed md:text-2xl md:leading-relaxed md:max-w-2xl"
        >
          Discover our collection of luxurious cosmetics, designed to enhance
          your natural beauty.
        </p>
      </div>
    </section>

    {{-- Search Field --}}
    <div class="flex justify-center mt-4 mb-8">
      <input
        type="text"
        placeholder="Search for products..."
        class="border border-gray-300 rounded-lg p-2 w-full max-w-md focus:outline-none focus:ring focus:ring-[#493f35]"
      />
      <button class="bg-[#493f35] text-white rounded-lg px-4 py-2 ml-2">
        <i class="fas fa-search"></i>
      </button>
    </div>

    {{-- Main Content --}}
    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto px-4 py-8 gap-6">
      {{-- Sidebar Filters --}}
       @include('partials.sidebar') 
      {{-- Products
      Section --}}
      <main class="w-full lg:w-3/4">
        {{-- Sorting & Pagination --}} 
        @include('partials.sort-pagination') 
        {{--
        Product Grid --}}
        <section
          id="product-grid"
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
        >
          {{-- @foreach($products as $product) --}} {{--
          @include('partials.product-card', ['product' => $product]) --}} {{--
          @endforeach --}}
        </section>
      </main>
    </div>

    {{-- Footer --}} @include('partials.footer') @stack('scripts')
  </body>
</html>
