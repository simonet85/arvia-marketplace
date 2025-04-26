<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About us - Arvía</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  </head>
  <body class="bg-[#f9f8f4] text-gray-800">
    <!-- Navbar -->
    <nav class="bg-[#f9f7f5] sticky top-0 z-50 shadow-sm">
      <div
        class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between"
      >
        <h1 class="text-2xl font-bold text-[#7a6b5f] tracking-wide">Arvía</h1>
        <div
          class="hidden md:flex gap-8 text-sm uppercase font-medium tracking-wide"
        >
          <a href="#" class="hover:text-[#7a6b5f] transition">Home</a>
          <a href="#" class="hover:text-[#7a6b5f] transition">Products</a>
          <a href="#" class="hover:text-[#7a6b5f] transition">About</a>
          <a href="#" class="hover:text-[#7a6b5f] transition">Categories</a>
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
    <section
      class="bg-cover bg-center h-[400px] md:h-[600px] flex items-center justify-center text-center text-white relative bg-[url('/images/hero.jpg')]"
    >
      <div class="bg-black bg-opacity-[0.5] p-12 rounded-md md:p-16">
        <span class="font-serif text-xl md:text-[3rem] font-bold mb-[1rem]"
          >About Us</span
        >
        <p>
          Discover the journey behind Arvéa Nature and our commitment to natural
          beauty.
        </p>
      </div>
    </section>

    <section class="bg-[#f9f8f4] py-16 px-6 md:px-16">
      <!-- add a tagline -->
      <div class="text-center mb-12">
        <h2
          class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-6 underline"
        >
          <span class="p-1 rounded-md">Our</span>
          <span class="p-1 rounded-md">Story</span>
        </h2>
        <p class="text-gray-700 max-w-2xl mx-auto leading-relaxed">
          At Arvéa Nature, we believe in the power of nature to enhance your
          beauty. Our products are crafted with love and care, using only the
          finest natural ingredients.
        </p>
      </div>
      <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-12 items-center">
        <!-- Left: About Text -->
        <div>
          <h2 class="text-3xl font-serif font-bold text-gray-900 mb-6">
            From Nature to Beauty
          </h2>
          <p class="text-gray-700 mb-4 leading-relaxed">
            Founded in 2010, Arvéa Nature was born out of a simple belief:
            beauty products should enhance your natural beauty, not mask it. Our
            founder, Elise Laurent, was frustrated with the harsh chemicals
            found in mainstream cosmetics and set out to create a line of
            products that worked with nature, not against it.
          </p>
          <p class="text-gray-700 mb-6 leading-relaxed">
            What started as a small workshop in her kitchen has grown into a
            beloved brand trusted by thousands around the world. Yet, our
            philosophy remains unchanged – to craft premium cosmetics that
            harmonize with your skin's natural beauty.
          </p>
          <a
            href="/products"
            class="inline-block bg-black text-white px-6 py-3 rounded-2xl shadow hover:bg-gray-800 transition"
          >
            Explore More Products
          </a>
        </div>

        <!-- Right: Product Image -->
        <div class="overflow-hidden rounded-2xl shadow-lg">
          <img
            src="/images/products/Essential-Oil-Set.jpg"
            alt="Arvéa Product"
            class="w-full h-[250px] object-cover transition duration-300 hover:scale-105"
          />
        </div>
      </div>
    </section>

    <!-- Our Values -->
    <section class="bg-[#f9f8f4] py-20 px-6 md:px-16">
      <div class="max-w-6xl mx-auto text-center">
        <h2
          class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-3 underline underline-offset-2"
        >
          Our Values
        </h2>
        <div class="h-2"></div>
        <div class="grid md:grid-cols-3 gap-8">
          <!-- Sustainability -->
          <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="text-green-600 mb-4">
              <svg
                class="w-10 h-10 mx-auto"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 2C8.686 2 6 4.686 6 8a6 6 0 001.585 4.093A10.04 10.04 0 014 20a10.05 10.05 0 0111.268-9.92A6 6 0 0012 2z"
                />
              </svg>
            </div>
            <h3 class="font-semibold text-lg text-gray-800 mb-2">
              Sustainability
            </h3>
            <p class="text-gray-600 text-sm">
              We source responsibly and use eco-friendly packaging to reduce our
              environmental footprint.
            </p>
          </div>

          <!-- Transparency -->
          <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="text-blue-600 mb-4">
              <svg
                class="w-10 h-10 mx-auto"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M12 4v1m0 14v1m8-9h1M4 12H3m15.364-6.364l.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M9 12a3 3 0 106 0 3 3 0 00-6 0z"
                />
              </svg>
            </div>
            <h3 class="font-semibold text-lg text-gray-800 mb-2">
              Transparency
            </h3>
            <p class="text-gray-600 text-sm">
              Every ingredient is listed clearly – no secrets, no surprises.
              Just honesty and clarity.
            </p>
          </div>

          <!-- Cruelty-Free -->
          <div class="bg-white rounded-2xl shadow-md p-6">
            <div class="text-pink-600 mb-4">
              <svg
                class="w-10 h-10 mx-auto"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M9 5l7 7-7 7"
                />
              </svg>
            </div>
            <h3 class="font-semibold text-lg text-gray-800 mb-2">
              Cruelty-Free
            </h3>
            <p class="text-gray-600 text-sm">
              No animal testing. Ever. Our products are 100% cruelty-free and
              ethically crafted.
            </p>
          </div>
        </div>
      </div>
    </section>
  </body>

      <!-- Footer Links -->

      <footer class="bg-[#f9f7f5] px-6 md:px-12 lg:px-24 py-12 mt-16">
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
</html>
