@extends('layouts.app')
@section('content')

    <!-- Hero Section -->
    <section
      class="relative bg-[url('/images/hero.jpg')] bg-cover bg-center h-[500px] md:h-[600px] flex items-center justify-center"
    >
      <div
        class="bg-black/50 backdrop-blur-sm text-white text-center p-10 md:p-16 rounded-xl max-w-2xl"
      >
        <h2 class="font-serif text-4xl md:text-5xl font-bold mb-4">About Us</h2>
        <p class="text-base md:text-lg">
          Discover the journey behind Arvéa Nature and our commitment to natural
          beauty.
        </p>
      </div>
    </section>

    <!-- Story Section -->
    <section class="py-20 px-6 md:px-16 bg-[#f9f8f4]">
      <div class="text-center mb-12">
        <h2
          class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-4"
        >
          Our Story
        </h2>
        <p
          class="text-gray-700 max-w-2xl mx-auto text-base md:text-lg leading-relaxed"
        >
          At Arvéa Nature, we believe in the power of nature to enhance your
          beauty. Our products are crafted with love and care, using only the
          finest natural ingredients.
        </p>
      </div>
      <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <div>
          <h3 class="text-3xl font-serif font-semibold text-gray-900 mb-4">
            From Nature to Beauty
          </h3>
          <p class="text-gray-700 mb-4 leading-loose">
            Founded in 2010, Arvéa Nature was born out of a simple belief:
            beauty products should enhance your natural beauty, not mask it.
            Elise Laurent, our founder, set out to create a line of clean
            cosmetics after years of frustration with chemical-heavy products.
          </p>
          <p class="text-gray-700 mb-6 leading-loose">
            What started in her kitchen is now a global movement. Yet, our
            mission remains the same – to craft premium, natural cosmetics that
            harmonize with your skin.
          </p>
          <a
            href="/products"
            class="inline-block bg-[#7a6b5f] text-white px-6 py-3 rounded-full shadow hover:bg-[#5e5249] transition"
          >
            Explore More Products
          </a>
        </div>
        <div class="overflow-hidden rounded-2xl shadow-lg">
          <img
            src="/images/products/Essential-Oil-Set.jpg"
            alt="Arvéa Product"
            class="w-full h-[300px] object-cover hover:scale-105 transition duration-500 ease-in-out"
          />
        </div>
      </div>
    </section>

    <!-- Our Values Section -->
    <section class="bg-[#fdfcfb] py-20 px-6 md:px-16">
      <div class="max-w-6xl mx-auto text-center">
        <h2
          class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-12"
        >
          Our Values
        </h2>
        <div class="grid md:grid-cols-3 gap-8">
          <!-- Card -->
          <div
            class="bg-white rounded-3xl shadow p-8 hover:shadow-md transition duration-300"
          >
            <div class="text-green-500 mb-4">
              <i class="fas fa-leaf text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
              Sustainability
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed">
              We source responsibly and use eco-friendly packaging to reduce our
              environmental footprint.
            </p>
          </div>

          <div
            class="bg-white rounded-3xl shadow p-8 hover:shadow-md transition duration-300"
          >
            <div class="text-blue-500 mb-4">
              <i class="fas fa-eye text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
              Transparency
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed">
              Every ingredient is listed clearly – no secrets, no surprises.
              Just honesty and clarity.
            </p>
          </div>

          <div
            class="bg-white rounded-3xl shadow p-8 hover:shadow-md transition duration-300"
          >
            <div class="text-pink-500 mb-4">
              <i class="fas fa-paw text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
              Cruelty-Free
            </h3>
            <p class="text-gray-600 text-sm leading-relaxed">
              No animal testing. Ever. Our products are 100% cruelty-free and
              ethically crafted.
            </p>
          </div>
        </div>
      </div>
    </section>
@endsection