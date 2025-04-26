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

    <!-- Header -->
    <header class="bg-[#f9f7f5] py-16">
      <div class="container mx-auto px-6 md:px-12">
        <h1 class="text-3xl font-serif text-center mb-6">Soin des Cheveux</h1>
      </div>
    </header>

    <!-- Filtres -->
    <section class="px-4 md:px-12 py-8 max-w-7xl mx-auto">
      <div class="flex flex-col sm:flex-row gap-4 mb-6 justify-center">
        <select
          id="filterType"
          class="border border-gray-300 rounded-md p-2 text-sm w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-black"
        >
          <option value="">Filtrer par type</option>
          <option value="shampooing">Shampooing</option>
          <option value="soin">Soin</option>
          <option value="masque">Masque</option>
          <option value="traitement">Traitement</option>
        </select>

        <select
          id="filterIngredient"
          class="border border-gray-300 rounded-md p-2 text-sm w-full sm:w-auto focus:outline-none focus:ring-2 focus:ring-black"
        >
          <option value="">Filtrer par ingrédient</option>
          <option value="huile_de_coconut">Huile de Coco</option>
          <option value="huile_d_argane">Huile d'Argane</option>
          <option value="huile_de_jojoba">Huile de Jojoba</option>
          <option value="protéines_de_soja">Protéines de Soja</option>
        </select>

        <button
          id="resetFilters"
          class="bg-gray-200 text-sm px-4 py-2 rounded hover:bg-gray-300 transition w-full sm:w-auto"
        >
          Réinitialiser
        </button>
      </div>

      <!-- Produits -->
      <div
        id="products"
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6"
      >
        <!-- Example Product -->
        <div
          data-type="shampooing"
          data-ingredient="huile_de_coconut"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/shampooing-huile-de-coconut.jpg"
            alt="Shampooing Huile de Coco"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Shampooing Huile de Coco</h2>
            <p class="text-sm text-gray-600 mb-2">
              Un shampooing doux et naturel pour les cheveux secs
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
          data-type="soin"
          data-ingredient="huile_d_argane"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/soin-huile-d-argane.jpg"
            alt="Soin Huile d'Argane"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Soin Huile d'Argane</h2>
            <p class="text-sm text-gray-600 mb-2">
              Revitalisant pour cheveux abîmés
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
          data-type="masque"
          data-ingredient="huile_de_jojoba"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/masque-huile-de-jojoba.jpg"
            alt="Masque Huile de Jojoba"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Masque Huile de Jojoba</h2>
            <p class="text-sm text-gray-600 mb-2">
              Hydratation intense pour tous les types de cheveux
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
          data-type="traitement"
          data-ingredient="protéines_de_soja"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/traitement-proteines-de-soja.jpg"
            alt="Traitement Protéines de Soja"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">
              Traitement Protéines de Soja
            </h2>
            <p class="text-sm text-gray-600 mb-2">
              Fortifiant pour une chevelure plus épaisse
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
          data-type="shampooing"
          data-ingredient="protéines_de_soja"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/shampooing-proteines-de-soja.jpg"
            alt="Shampooing Protéines de Soja"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">
              Shampooing Protéines de Soja
            </h2>
            <p class="text-sm text-gray-600 mb-2">
              Nettoie en douceur tout en renforçant les cheveux
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
          data-type="masque"
          data-ingredient="huile_de_coconut"
          class="product-card border rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition"
        >
          <img
            src="/images/produits/masque-huile-de-coconut.jpg"
            alt="Masque Huile de Coco"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h2 class="text-lg font-serif mb-1">Masque Huile de Coco</h2>
            <p class="text-sm text-gray-600 mb-2">
              Nourrit et adoucit les cheveux secs et abîmés
            </p>
            <button
              class="bg-black text-white px-4 py-2 rounded w-full text-sm hover:bg-gray-800 transition"
            >
              Voir
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
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

    <!-- JS : Filtres -->
    <script>
      const typeFilter = document.getElementById("filterType");
      const ingFilter = document.getElementById("filterIngredient");
      const resetBtn = document.getElementById("resetFilters");
      const products = document.querySelectorAll(".product-card");

      function filterProducts() {
        const type = typeFilter.value;
        const ing = ingFilter.value;

        products.forEach((product) => {
          const typeMatch = type === "" || product.dataset.type === type;
          const ingMatch = ing === "" || product.dataset.ingredient === ing;

          if (typeMatch && ingMatch) {
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
