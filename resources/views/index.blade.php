<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Arvía Beauty Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  </head>
  <body class="bg-[#f9f8f4] text-gray-800 overflow-x-hidden">
    <!-- Navbar -->
    <nav class="bg-[#f9f7f5] sticky top-0 z-50 shadow-sm">
      <div
        class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between"
      >
        <h1 class="text-2xl font-bold text-[#7a6b5f] tracking-wide">Arvía</h1>
        <div
          class="hidden md:flex gap-8 text-sm uppercase font-medium tracking-wide"
        >
          <a href="index.html" class="hover:text-[#7a6b5f] transition">Home</a>
          <a href="products.html" class="hover:text-[#7a6b5f] transition"
            >Products</a
          >
          <a href="about.html" class="hover:text-[#7a6b5f] transition">About</a>
          <a href="categories.html" class="hover:text-[#7a6b5f] transition"
            >Categories</a
          >
        </div>
        <div class="flex items-center gap-4 text-xl text-[#7a6b5f]">
          <button class="hover:text-black transition">
            <i class="fas fa-search"></i>
          </button>
          <button class="hover:text-black transition">
            <i class="fas fa-heart"></i>
          </button>
          <button class="hover:text-black transition">
            <i class="fas fa-user"></i>
          </button>
          <button class="hover:text-black transition">
            <i class="fas fa-shopping-cart"></i>
          </button>
          <button id="mobile-menu-button" class="md:hidden ml-2">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div
        id="mobile-menu-content"
        class="hidden md:hidden bg-[#f5f4f2] px-6 py-4"
      >
        <div class="flex flex-col gap-2 text-sm">
          <a href="#" class="py-1 hover:text-[#7a6b5f]">Home</a>
          <a href="#" class="py-1 hover:text-[#7a6b5f]">Products</a>
          <a href="#" class="py-1 hover:text-[#7a6b5f]">About</a>
          <a href="#" class="py-1 hover:text-[#7a6b5f]">Categories</a>
        </div>
      </div>
    </nav>

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
                src="./images/categories/skin-care.jpg"
                alt=""
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
                src="./images/categories/make-up.jpg"
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
                src="./images/categories/perfume.jpg"
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
                src="./images/categories/hair-care.jpg"
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
              src="./images/products/Hydrating-Facial-Serum.jpg"
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
              src="./images/products/Natural-Lipstick.jpg"
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
              src="./images/products/Moisturizing-Body-Cream.jpg"
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
              src="./images/products/Essential-Oil-Set.jpg"
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
            src="./images/about-image.jpg"
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

    <footer class="bg-[#f9f5f2] text-neutral-800 py-16">
      <div class="container mx-auto px-4">
        <!-- Newsletter Section -->
        <div class="text-center mb-12">
          <h2
            class="font-serif text-medium md:text-5xl font-medium text-[#7a6b5f] mb-6"
          >
            Join Our Newsletter
          </h2>
          <p class="text-[#8b7d72] mb-6">
            Subscribe to receive updates on new products, special offers, and
            beauty tips tailored to your preferences.
          </p>
          <form class="flex justify-center items-center max-w-md mx-auto">
            <input
              type="email"
              placeholder="Your email address"
              class="w-full px-4 py-2 border border-neutral-300 rounded-l-md focus:outline-none focus:ring focus:ring-neutral-300"
            />
            <button
              type="submit"
              class="bg-[#493f35] text-white px-6 py-2 rounded-r-md hover:bg-bg-[#655b51] transition"
            >
              Subscribe
            </button>
          </form>
          <p class="text-xs text-[#8b7d72] mt-3">
            By subscribing, you agree to our Privacy Policy and consent to
            receive marketing communications.
          </p>
        </div>

        <!-- Footer Links -->

        <div class="bg-[#f9f7f5] px-6 md:px-12 lg:px-24 py-12 mt-16">
          <div
            class="grid grid-cols-1 md:grid-cols-3 gap-12 border-t border-neutral-300 pt-12 text-center md:text-left justify-items-center md:items-start"
          >
            <!-- About Section -->
            <div>
              <h3 class="text-lg font-semibold mb-4 text-[#8b7d72]">ARVÉA</h3>
              <p class="text-neutral-600 mb-4 max-w-sm">
                Arvéa Nature crafts premium cosmetics that harmonize with your
                natural beauty, enhancing what makes you uniquely you.
              </p>
              <div class="flex space-x-4 justify-center md:justify-start">
                <a
                  href="#"
                  class="text-neutral-600 hover:text-neutral-800 transition transform hover:scale-110 duration-200 text-xl"
                >
                  <i class="fab fa-facebook"></i>
                </a>
                <a
                  href="#"
                  class="text-neutral-600 hover:text-neutral-800 transition transform hover:scale-110 duration-200 text-xl"
                >
                  <i class="fab fa-instagram"></i>
                </a>
                <a
                  href="#"
                  class="text-neutral-600 hover:text-neutral-800 transition transform hover:scale-110 duration-200 text-xl"
                >
                  <i class="fab fa-twitter"></i>
                </a>
              </div>
            </div>

            <!-- Quick Links Section -->
            <div>
              <h3 class="text-lg font-semibold mb-4 text-neutral-800">
                Quick Links
              </h3>
              <ul class="space-y-2 text-neutral-600">
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >All Products</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Face Care</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Skincare</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Makeup</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Perfumes</a
                  >
                </li>
              </ul>
            </div>

            <!-- Information Section -->
            <div>
              <h3 class="text-lg font-semibold mb-4 text-neutral-800">
                Information
              </h3>
              <ul class="space-y-2 text-neutral-600">
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >About Us</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Contact Us</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Shipping & Returns</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Privacy Policy</a
                  >
                </li>
                <li>
                  <a
                    href="#"
                    class="hover:text-neutral-800 transition-colors duration-200"
                    >Terms & Conditions</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Contact Info -->
        <div
          class="mt-8 text-center text-sm text-neutral-500 border-t border-neutral-300 pt-6"
        >
          <p>© 2025 Arvéa Nature. All rights reserved.</p>
          <p>
            contact@arvea-nature.com | +1 (555) 123-4567 | 123 Beauty Lane,
            Cosmetics City, CO 12345
          </p>
        </div>
      </div>
    </footer>

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
    </script>
  </body>
</html>
