<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Arvía Beauty Products - Parfums</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  </head>
  <body class="bg-[#f9f8f4] text-gray-800 overflow-x-hidden">
    <!-- Naviation  -->
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
    <!-- Fil d'Ariane  -->
    <nav
      class="px-4 md:px-12 py-4 max-w-7xl mx-auto flex items-center gap-2 text-sm"
    >
      <a href="/" class="hover:text-[#7a6b5f]">Accueil</a>
      <span class="text-gray-300">/</span>
      <a href="#" class="hover:text-[#7a6b5f]">Parfums</a>
    </nav>
    <section class="px-4 md:px-12 py-8 max-w-7xl mx-auto">
      <h1 class="text-3xl font-serif text-center mb-6">Parfums</h1>

      <div class="flex flex-col sm:flex-row gap-4 mb-6 justify-center">
        <select
          id="filterType"
          class="border border-gray-300 rounded-md p-2 text-sm w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-black"
        >
          <option value="">Filtrer par type</option>
          <option value="eau_de_parfum">Eau de Parfum</option>
          <option value="eau_de_toilette">Eau de Toilette</option>
        </select>

        <select
          id="filterIngredient"
          class="border border-gray-300 rounded-md p-2 text-sm w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-black"
        >
          <option value="">Filtrer par ingrédient</option>
          <option value="rose">Rose</option>
          <option value="vanille">Vanille</option>
          <option value="jasmin">Jasmin</option>
        </select>

        <button
          id="resetFilters"
          class="bg-gray-200 text-sm px-4 py-2 rounded hover:bg-gray-300 transition w-full sm:w-auto"
        >
          Réinitialiser
        </button>
      </div>

      <div
        id="products"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
      >
        <!-- Example Product -->
        <div
          data-type="eau_de_parfum"
          data-ingredient="rose"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/parfum-rose.jpg"
            alt="Eau de Parfum Rose"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Eau de Parfum Rose</h2>
            <p class="text-sm text-gray-600 mb-2">
              Un parfum envoûtant à la rose
            </p>
            <button
              class="bg-black text-white px-4 py-2 rounded w-full text-sm hover:bg-gray-800 transition"
            >
              Voir
            </button>
          </div>
        </div>
        <!-- Example Product -->
        <div
          data-type="eau_de_parfum"
          data-ingredient="vanille"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/parfum-vanille.jpg"
            alt="Eau de Parfum Vanille"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Eau de Parfum Vanille</h2>
            <p class="text-sm text-gray-600 mb-2">Un parfum sucré et subtil</p>
            <button
              class="bg-black text-white px-4 py-2 rounded w-full text-sm hover:bg-gray-800 transition"
            >
              Voir
            </button>
          </div>
        </div>

        <!-- Example Product -->
        <div
          data-type="eau_de_parfum"
          data-ingredient="jasmin"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/parfum-jasmin.jpg"
            alt="Eau de Parfum Jasmin"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Eau de Parfum Jasmin</h2>
            <p class="text-sm text-gray-600 mb-2">
              Un parfum fleuri et sensuel
            </p>
            <button
              class="bg-black text-white px-4 py-2 rounded w-full text-sm hover:bg-gray-800 transition"
            >
              Voir
            </button>
          </div>
        </div>

        <!-- Example Product -->
        <div
          data-type="eau_de_toilette"
          data-ingredient="citron"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/parfum-citron.jpg"
            alt="Eau de Toilette Citron"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Eau de Toilette Citron</h2>
            <p class="text-sm text-gray-600 mb-2">
              Un parfum frais et lumineux
            </p>
            <button
              class="bg-black text-white px-4 py-2 rounded w-full text-sm hover:bg-gray-800 transition"
            >
              Voir
            </button>
          </div>
        </div>

        <!-- Example Product -->
        <div
          data-type="eau_de_toilette"
          data-ingredient="fraises"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/parfum-fraises.jpg"
            alt="Eau de Toilette Fraises"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Eau de Toilette Fraises</h2>
            <p class="text-sm text-gray-600 mb-2">
              Un parfum fruité et printanier
            </p>
            <button
              class="bg-black text-white px-4 py-2 rounded w-full text-sm hover:bg-gray-800 transition"
            >
              Voir
            </button>
          </div>
        </div>

        <!-- Example Product -->
        <div
          data-type="eau_de_toilette"
          data-ingredient="fleur_oranger"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/parfum-fleur-oranger.jpg"
            alt="Eau de Toilette Fleur d'Oranger"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">
              Eau de Toilette Fleur d'Oranger
            </h2>
            <p class="text-sm text-gray-600 mb-2">Un parfum subtil et éthéré</p>
            <button
              class="bg-black text-white px-4 py-2 rounded w-full text-sm hover:bg-gray-800 transition"
            >
              Voir
            </button>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-[#f9f5f2] text-neutral-800 py-16">
      <div class="container mx-auto px-4">
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

    <script>
      const typeFilter = document.getElementById("filterType");
      const ingFilter = document.getElementById("filterIngredient");
      const resetBtn = document.getElementById("resetFilters");
      const products = document.querySelectorAll(".product-card");

      function filterProducts() {
        const typeValue = typeFilter.value.toLowerCase();
        const ingValue = ingFilter.value.toLowerCase();

        products.forEach((product) => {
          const matchesType =
            !typeValue || product.getAttribute("data-type").includes(typeValue);
          const matchesIngredient =
            !ingValue ||
            product.getAttribute("data-ingredient").includes(ingValue);

          if (matchesType && matchesIngredient) {
            product.style.display = "block";
          } else {
            product.style.display = "none";
          }
        });
      }

      typeFilter.addEventListener("change", filterProducts);
      ingFilter.addEventListener("change", filterProducts);
      resetBtn.addEventListener("click", () => {
        typeFilter.value = "";
        ingFilter.value = "";
        filterProducts();
      });
    </script>
  </body>
</html>
