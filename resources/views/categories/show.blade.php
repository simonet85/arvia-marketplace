@extends('layouts.app')
@section('content')
    <div class="max-w-6xl mx-auto px-4 py-10">
      <!-- Breadcrumb -->
      <nav class="text-sm text-gray-500 mb-6">
        <a href="categories.html" class="hover:underline">Catégories</a> /
        <a href="categorie-soin-du-visage.html" class="hover:underline"
          >Soin du Visage</a
        >
        /
        <span class="text-gray-700">Crème Hydratante Aloe Vera</span>
      </nav>

      <!-- Produit -->
      <div class="grid md:grid-cols-2 gap-10">
        <!-- Image -->
        <div>
          <img
            src="https://source.unsplash.com/600x600/?cream,skincare"
            alt="Crème Aloe Vera"
            class="rounded-2xl shadow-lg object-cover w-full h-auto"
          />
        </div>

        <!-- Détails produit -->
        <div>
          <h1 class="text-3xl font-serif mb-2">Crème Hydratante Aloe Vera</h1>
          <p class="text-gray-500 mb-4">
            50ml – Pour peaux sensibles et déshydratées
          </p>

          <div class="text-xl font-semibold text-green-700 mb-4">19,90€</div>

          <p class="text-gray-700 mb-6 leading-relaxed">
            Cette crème à base d’aloe vera bio hydrate en profondeur, apaise les
            rougeurs et redonne éclat à votre peau. Enrichie en beurre de karité
            et vitamine E, elle convient à toutes les peaux même les plus
            sensibles.
          </p>

          <ul class="mb-6 text-sm text-gray-600 space-y-2">
            <li>✔ 98% d’ingrédients d’origine naturelle</li>
            <li>✔ Non testée sur les animaux</li>
            <li>✔ Certifiée bio & vegan</li>
          </ul>

          <button
            class="bg-gray-800 text-white px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-700 transition"
          >
            Ajouter au panier
          </button>
        </div>
      </div>

      <!-- Section ingrédients -->
      <div class="mt-16 border-t pt-10">
        <h2 class="text-2xl font-serif mb-4">Ingrédients Clés</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-700">
          <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
            <h3 class="font-semibold mb-1">Aloe Vera Bio</h3>
            <p>Hydrate intensément et apaise les irritations.</p>
          </div>
          <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
            <h3 class="font-semibold mb-1">Beurre de Karité</h3>
            <p>Nourrit et protège la barrière cutanée.</p>
          </div>
          <div class="bg-gray-50 p-4 rounded-xl shadow-sm">
            <h3 class="font-semibold mb-1">Vitamine E</h3>
            <p>Antioxydant naturel pour lutter contre le vieillissement.</p>
          </div>
        </div>
      </div>

      <!-- Produits similaires -->
      <div class="mt-16">
        <h2 class="text-2xl font-serif mb-4">Produits Similaires</h2>
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <a
            href="#"
            class="block group border rounded-2xl overflow-hidden hover:shadow-md transition"
          >
            <img
              src="https://source.unsplash.com/400x300/?serum,skincare"
              class="w-full h-48 object-cover"
            />
            <div class="p-3">
              <h3 class="font-semibold text-sm">Sérum Éclat Vitamine C</h3>
              <p class="text-sm text-gray-600 mt-1">24,90€</p>
            </div>
          </a>
          <a
            href="#"
            class="block group border rounded-2xl overflow-hidden hover:shadow-md transition"
          >
            <img
              src="https://source.unsplash.com/400x300/?moisturizer,face"
              class="w-full h-48 object-cover"
            />
            <div class="p-3">
              <h3 class="font-semibold text-sm">Crème Nourrissante Nuit</h3>
              <p class="text-sm text-gray-600 mt-1">21,00€</p>
            </div>
          </a>
          <!-- Ajoute d’autres suggestions si besoin -->
        </div>
      </div>
    </div>

@endsection