@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section
      class="bg-cover bg-center h-screen flex items-center justify-center text-center text-white relative bg-[url('images/arvea-marketplace.jpg')]"
    >
      <div class="bg-black bg-opacity-[0.5] p-[24px] rounded-md">
        <h2 class="text-4xl font-bold mb-4">Discover Your Natural Radiance</h2>
        <p class="text-lg mb-6">
          Luxurious, sustainable cosmetics crafted to enhance your unique
          beauty. Experience the Arvía difference.
        </p>
        <button
          class="bg-gray-800 text-white py-2 px-6 rounded hover:bg-gray-700"
        >
          Shop Collection
        </button>
      </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <h3
          class="inline-block px-3 py-1 bg-[#7a6b5f] text-white/80 text-xs font-medium rounded-full mb-3"
        >
          Explore Our Collections
        </h3>
        <div class="flex flex-col items-center text-center mb-6">
          <span
            class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-6"
            >Discover By Category</span
          >
          <p class="text-[#8b7d72] max-w-3xl mx-auto leading-relaxed">
            Browse our carefully curated categories of premium beauty products,
            each designed to enhance your natural beauty.
          </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Category Card -->
          <a href="categorie-soin-du-corps.html">
            <div class="bg-white shadow-md rounded overflow-hidden">
              <img
                src="{{ asset('images/categories/skin-care.jpg') }}"
                alt="skin-care"
                class="w-full h-[200px] object-cover"
              />
              <div class="p-4 h-40">
                <h4 class="font-bold mb-2">Skin Care</h4>
                <p>Explore products for your skin.</p>
                <button
                  class="mt-4 bg-gray-800 text-white py-2 px-6 rounded hover:bg-gray-700"
                >
                  Explore
                </button>
              </div>
            </div>
          </a>

          <!-- Makeup Category Card -->
          <a href="categorie-soin-du-visage.html">
            <div class="bg-white shadow-md rounded overflow-hidden">
              <img
                src="{{ asset('images/categories/make-up.jpg') }}"
                alt=""
                class="w-full h-[200px] object-cover"
              />
              <div class="p-4 h-40">
                <h4 class="font-bold mb-2">Makeup</h4>
                <p>Enhance your look with our makeup range.</p>
                <button
                  class="mt-4 bg-gray-800 text-white py-2 px-6 rounded hover:bg-gray-700"
                >
                  Explore
                </button>
              </div>
            </div>
          </a>

          <!-- Perfume Category Card -->
          <a href="categorie-parfum.html">
            <div class="bg-white shadow-md rounded overflow-hidden">
              <img
                src="{{ asset('images/categories/perfume.jpg') }}"
                alt=""
                class="w-full h-[200px] object-cover"
              />
              <div class="p-4 h-40">
                <h4 class="font-bold mb-2">Perfume</h4>
                <p>Find your signature scent.</p>
                <button
                  class="mt-4 bg-gray-800 text-white py-2 px-6 rounded hover:bg-gray-700"
                >
                  Explore
                </button>
              </div>
            </div>
          </a>

          <!-- Hair Care Category Card -->
          <a href="categorie-soin-de-cheveux.html">
            <div class="bg-white shadow-md rounded overflow-hidden">
              <img
                src="{{ asset('images/categories/hair-care.jpg') }}"
                alt=""
                class="w-full h-[200px] object-cover"
              />
              <div class="p-4 h-40">
                <h4 class="font-bold mb-2">Hair Care</h4>
                <p>Nourish your hair with our natural products.</p>
                <button
                  class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51] transition"
                >
                  Explore
                </button>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>

    <!-- Featured Products -->
    <section class="py-16 bg-beige-100">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <!-- <h3 class="text-xl font-semibold mb-8">Featured Products</h3> -->
        <div class="flex flex-col items-center text-center mb-6">
          <span
            class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-6"
            >Featured Products</span
          >
          <p class="text-[#8b7d72] max-w-3xl mx-auto leading-relaxed">
            Explore our handpicked selection of top-rated products, chosen for
            their outstanding quality and impressive results that you can trust.
          </p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Product Card -->
          <div
            class="bg-white shadow-md rounded overflow-hidden p-4 transition duration-300 transform hover:scale-105"
          >
            <img
              src="{{ asset('images/products/Hydrating-Facial-Serum.jpg') }}"
              alt=""
              class="w-full h-[200px] object-cover mb-4"
            />
            <h4 class="font-bold mb-2">Hydrating Facial Serum</h4>
            <p>$48.00</p>
            <!-- Rating Stars -->
            <div class="flex mb-4">
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-gray-400">&#9733;</span>
            </div>
            <div
              class="flex justify-between items-center transition duration-300"
            >
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Cart
              </button>
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Wishlist
              </button>
            </div>
          </div>

          <!-- Product Card -->
          <div
            class="bg-white shadow-md rounded overflow-hidden p-4 transition duration-300 transform hover:scale-105"
          >
            <img
              src="{{asset('images/products/Natural-Lipstick.jpg')}}"
              alt=""
              class="w-full h-[200px] object-cover mb-4"
            />
            <h4 class="font-bold mb-2">Natural Lipstick</h4>
            <p>$25.00</p>
            <!-- Rating Stars -->
            <div class="flex mb-4">
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
            </div>
            <div
              class="flex justify-between items-center transition duration-300"
            >
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Cart
              </button>
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Wishlist
              </button>
            </div>
          </div>

          <!-- Product Card -->
          <div
            class="bg-white shadow-md rounded overflow-hidden p-4 transition duration-300 transform hover:scale-105"
          >
            <img
              src="{{asset('images/products/Moisturizing-Body-Cream.jpg')}}"
              alt=""
              class="w-full h-[200px] object-cover mb-4"
            />
            <h4 class="font-bold mb-2">Moisturizing Body Cream</h4>
            <p>$32.00</p>
            <!-- Rating Stars -->
            <div class="flex mb-4">
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-gray-400">&#9733;</span>
              <span class="text-gray-400">&#9733;</span>
            </div>
            <div
              class="flex justify-between items-center transition duration-300"
            >
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Cart
              </button>
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Wishlist
              </button>
            </div>
          </div>

          <!-- Product Card -->
          <div
            class="bg-white shadow-md rounded overflow-hidden p-4 transition duration-300 transform hover:scale-105"
          >
            <img
              src="{{asset('images/products/Essential-Oil-Set.jpg')}}"
              alt=""
              class="w-full h-[200px] object-cover mb-4"
            />
            <h4 class="font-bold mb-2">Essential Oil Set</h4>
            <p>$60.00</p>
            <!-- Rating Stars -->
            <div class="flex mb-4">
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-yellow-400">&#9733;</span>
              <span class="text-gray-400">&#9733;</span>
            </div>
            <div
              class="flex justify-between items-center transition duration-300"
            >
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Cart
              </button>
              <button
                class="bg-[#493f35] text-white py-2 px-4 rounded-lg bg-[#655b51]"
              >
                Add to Wishlist
              </button>
            </div>
          </div>
        </div>
        <button
          class="mt-6 bg-[#493f35] text-white py-2 px-6 rounded-lg hover:bg-[#655b51] transition"
        >
          View All Products
        </button>
      </div>
    </section>

    <div class="bg-beige-100 p-6 mb-6">
      <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
        <!-- Left Section: Image with Overlay -->
        <div class="relative md:w-1/2">
          <!-- Image -->
          <img
            src="{{asset('images/about-image.jpg')}}"
            alt="Arvéa Nature Products"
            class="rounded-lg shadow-md w-full h-auto object-cover"
          />
          <!-- Overlay Message -->
          <div
            class="absolute bottom-[-15px] right-[-15px] bg-white p-8 rounded-lg shadow-lg"
          >
            <p class="text-gray-600 italic text-sm">
              "Beauty should enhance, not mask, your true self."
            </p>
            <p class="text-gray-500 text-xs mt-1">— Emma Laurent, Founder</p>
          </div>
        </div>

        <!-- Right Section: Text Content -->
        <div class="md:w-1/2">
          <p
            class="inline-block px-3 py-1 text-xs font-medium bg-[#7e6767] text-white rounded-full mb-3"
          >
            Our Story
          </p>
          <h2 class="font-serif text-3xl font-bold text-[#9c958e] mb-4">
            Crafted With Nature, Designed For You
          </h2>
          <p class="text-gray-600 mb-4">
            Founded in 2010 by Emma Laurent, Arvéa Nature was born from a simple
            yet powerful belief: beauty products should work in harmony with
            your skin, not against it.
          </p>
          <p class="text-gray-600 mb-4">
            Our journey began in a small laboratory in southern France, where
            Emma combined her background in cosmetic chemistry with her passion
            for natural ingredients. Today, we continue to innovate while
            staying true to our original vision.
          </p>
          <p class="text-gray-600 mb-4">
            Every Arvéa product is crafted with meticulous attention to detail,
            using sustainable practices and ethically sourced ingredients that
            respect both your skin and our planet.
          </p>
          <button
            class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51] transition"
          >
            Read Our Full Story
          </button>
        </div>
      </div>
    </div>

    <!-- Testimonials Section -->
    <section class="py-16 bg-[#2e3748] text-white">
      <div class="max-w-7xl mx-auto px-4">
        <div class="flex text-center flex-col">
          <span
            class="inline-block px-3 py-1 text-xs font-medium bg-white/10 text-white rounded-full mb-3 mx-auto"
            >Testimonials</span
          >

          <h2
            class="font-serif text-3xl md:text-4xl font-medium text-white text-center mb-4 mx-auto"
          >
            What Our Customers Say
          </h2>
          <p class="text-white/80 max-w-2xl mx-auto">
            Read about the experiences of customers who have made Arvía products
            part of their daily beauty routine.
          </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
          <!-- Testimonial Card -->
          <div class="bg-[#384152] shadow-md rounded-md p-10">
            <div class="flex items-center justify-start mb-6">
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-gray-400">&#9733;</span>
            </div>
            <p class="mb-6">
              "I've never felt more confident in my own skin. Arvía's products
              are truly magical!"
            </p>
            <h4 class="font-bold">Emily R.</h4>
            <p class="text-sm text-white/70">Software Engineer</p>
          </div>

          <!-- Testimonial Card -->
          <div class="bg-[#384152] shadow-md rounded-md p-10">
            <div class="flex items-center justify-start mb-6">
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-gray-400">&#9733;</span>
            </div>
            <p class="mb-6">
              "The quality of Arvía's products is unmatched. I've switched to
              them for all my beauty needs."
            </p>
            <h4 class="font-bold">David K.</h4>
            <p class="text-sm text-white/70">Graphic Designer</p>
          </div>

          <!-- Testimonial Card -->
          <div class="bg-[#384152] shadow-md rounded-md p-10">
            <div class="flex items-center justify-start mb-6">
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-yellow-400 mr-2">&#9733;</span>
              <span class="text-gray-400">&#9733;</span>
            </div>
            <p class="mb-6">
              "I love how sustainable and eco-friendly Arvía is. Their products
              are amazing too!"
            </p>
            <h4 class="font-bold">Sarah T.</h4>
            <p class="text-sm text-white/70">Marketing Manager</p>
          </div>
        </div>
      </div>
    </section>
    
    <!--footer-->
    @include('partials.footer')

    <!-- Include FontAwesome for social icons -->
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>

    <script>
      //  JavaScript for Mobile Menu Toggle

      const btn = document.getElementById("mobile-menu-button");
      const menu = document.getElementById("mobile-menu-content");

      btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
      });

      // JavaScript for Scroll Effect
      const navbar = document.getElementById("navbar");
      window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
          navbar.classList.add("bg-white", "shadow-md");
          navbar.classList.remove("bg-[#f9f5f2]");
        } else {
          navbar.classList.add("bg-[#f9f5f2]");
          navbar.classList.remove("bg-white", "shadow-md");
        }
      });

    // Toggle Search Input
    document.getElementById("search-toggle").addEventListener("click", () => {
      const input = document.getElementById("search-input");
      input.classList.toggle("hidden");
      input.focus();
    });
    </script>
@endsection