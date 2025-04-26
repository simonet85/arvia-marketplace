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
          <a
            href="categorie-complements-alimentaires.html"
            class="hover:text-[#7a6b5f] transition"
            >Complements Alimentaires</a
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

    <!-- Fil d’Ariane -->
    <div class="max-w-7xl mx-auto px-4 py-4 text-sm text-gray-600">
      <a href="categories.html" class="hover:underline">Accueil</a> /
      <span class="text-gray-800">Compléments Alimentaires</span>
    </div>

    <!-- Titre + Filtres -->
    <main class="max-w-7xl mx-auto px-4 md:px-0 py-6">
      <h2 class="text-3xl font-serif mb-6 text-center">
        Compléments Alimentaires
      </h2>

      <!-- Filtres -->
      <div
        class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4"
      >
        <div class="flex flex-col md:flex-row gap-4">
          <select class="border px-3 py-2 rounded-md text-sm">
            <option>Filtrer par type</option>
            <option>Capsules</option>
            <option>Poudres</option>
            <option>Sirops</option>
          </select>
          <select class="border px-3 py-2 rounded-md text-sm">
            <option>Filtrer par ingrédient</option>
            <option>Vitamine C</option>
            <option>Spiruline</option>
            <option>Collagène</option>
          </select>
        </div>
        <button
          onclick="window.location.reload()"
          class="text-sm text-gray-700 hover:underline"
        >
          Réinitialiser les filtres
        </button>
      </div>

      <!-- Produits -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Produit 1 -->
        <div
          class="border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="/images/complements-vitc.jpg"
            alt="Vitamine C Boost"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h3 class="text-lg font-serif mb-1">Vitamine C Boost</h3>
            <p class="text-sm text-gray-600 mb-2">
              Renforce les défenses naturelles.
            </p>
            <span class="text-green-600 font-medium text-sm">5 900 FCFA</span>
          </div>
        </div>

        <!-- Produit 2 -->
        <div
          class="border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="/images/complements-spiruline.jpg"
            alt="Spiruline Pure"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h3 class="text-lg font-serif mb-1">Spiruline Pure</h3>
            <p class="text-sm text-gray-600 mb-2">
              Énergie et vitalité au quotidien.
            </p>
            <span class="text-green-600 font-medium text-sm">7 200 FCFA</span>
          </div>
        </div>

        <!-- Produit 3 -->
        <div
          class="border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="/images/complements-collagene.jpg"
            alt="Collagène Beauté"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h3 class="text-lg font-serif mb-1">Collagène Beauté</h3>
            <p class="text-sm text-gray-600 mb-2">
              Pour la peau, les cheveux, les ongles.
            </p>
            <span class="text-green-600 font-medium text-sm">10 500 FCFA</span>
          </div>
        </div>

        <!-- Produit 4 -->
        <div
          class="border rounded-2xl overflow-hidden shadow hover:shadow-lg transition"
        >
          <img
            src="/images/complements-detox.jpg"
            alt="Détox Bio"
            class="h-48 w-full object-cover"
          />
          <div class="p-4">
            <h3 class="text-lg font-serif mb-1">Détox Bio</h3>
            <p class="text-sm text-gray-600 mb-2">
              Purifie l’organisme naturellement.
            </p>
            <span class="text-green-600 font-medium text-sm">6 800 FCFA</span>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
