@extends('layouts.app')

@section('content')
<!-- Section Héros -->
<section
  class="bg-cover bg-center h-screen flex items-center justify-center text-center text-white relative bg-[url('images/arvea-marketplace.jpg')]"
>
  <div class="bg-black bg-opacity-[0.5] p-[24px] rounded-md">
    <h2 class="text-4xl font-bold mb-4">Découvrez votre éclat naturel</h2>
    <p class="text-lg mb-6">
      Des cosmétiques luxueux et durables conçus pour mettre en valeur votre beauté unique. <br>Découvrez la différence Arvía.
    </p>
    <a
      href="{{ url('/products') }}"
      class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51]"
    >
      Boutique
    </a>
  </div>
</section>

<!-- Section Catégories -->
<section class="py-16">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <h3
      class="inline-block px-3 py-1 bg-[#7a6b5f] text-white/80 text-xs font-medium rounded-full mb-3"
    >
      Explorez nos catégories
    </h3>
    <div class="flex flex-col items-center text-center mb-6">
      <span
        class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-6"
        >Découvrez nos catégories</span
      >
      <p class="text-[#8b7d72] max-w-3xl mx-auto leading-relaxed">
        Naviguez dans nos catégories de produits pour trouver ce qui vous convient le mieux.
      </p>
    </div>
  
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach ($categories as $category)
      <!-- Carte Catégorie -->
      <a href="{{route('categories.show', ['slug' => $category->slug])}}">
        <div class="bg-white shadow-md rounded overflow-hidden">
          <img
           src="{{ asset('storage/products/' . $category->image) }}"
            alt="soin-du-corps"
            class="w-full h-[200px] object-cover"
          />
          <div class="p-4 h-40">
            <h4 class="font-bold mb-2">{{ $category->name }}</h4>
            <p>{{ Str::limit($category->description,50) ,'...' }}</p>
            <button
              class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51] transition mt-2"
            >
              Explorer
            </button>
          </div>
        </div>
      </a>
      @endforeach
      
    </div>
  </div>
</section>

<!-- Produits Populaires -->
<section class="py-16 bg-beige-100">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <div class="flex flex-col items-center text-center mb-6">
      <span class="font-serif text-4xl md:text-5xl font-bold text-[#7a6b5f] mb-6">
        Découvrez nos produits populaires
      </span>
      <p class="text-[#8b7d72] max-w-3xl mx-auto leading-relaxed">
        Explorez nos produits populaires et trouvez celui qui correspond le mieux à vos besoins.
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach ($featuredProducts as $product)
        <div class="bg-white shadow-md rounded overflow-hidden p-4 transition duration-300 transform hover:scale-105">
          <!-- <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}"
               class="w-full h-[200px] object-cover mb-4" /> -->
      @if ($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-60 object-cover rounded-md mb-4" />
      @else
          <img src="https://via.placeholder.com/300x300?text=No+Image" alt="Pas d'image" class="w-full h-60 object-cover rounded-md mb-4" />
      @endif

          <h4 class="font-bold mb-2">{{ $product->name }}</h4>
          <p>{{ number_format($product->price, 2, ',', ' ') }} €</p>

          <!-- étoiles statiques ici ou dynamiques si vous avez une logique -->
          <div class="flex mb-4">
            @for ($i = 1; $i <= 5; $i++)
              <span class="{{ $i <= 4 ? 'text-yellow-400' : 'text-gray-400' }}">&#9733;</span>
            @endfor
          </div>

          <div class="flex justify-between items-center transition duration-300">
            <button class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51]">
              <i class="fas fa-shopping-cart" title="Ajouter au panier"></i>
            </button>
            <button class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51]">
              <i class="fas fa-heart" title="Ajouter à la liste de souhaits"></i>
            </button>
          </div>
        </div>
      @endforeach
    </div>

    <a href="{{ route('products.index') }}">
      <button class="mt-6 bg-[#493f35] text-white py-2 px-6 rounded-lg hover:bg-[#655b51] transition">
        Voir tous les produits
      </button>
    </a>
  </div>
</section>


<!-- Section À propos -->
<div class="bg-beige-100 p-6 mb-6">
  <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
    <!-- Image avec citation -->
    <div class="relative md:w-1/2">
      <img
        src="{{asset('images/about-image.jpg')}}"
        alt="Produits Arvéa Nature"
        class="rounded-lg shadow-md w-full h-auto object-cover"
      />
      <div
        class="absolute bottom-[-15px] right-[-15px] bg-white p-8 rounded-lg shadow-lg"
      >
        <p class="text-gray-600 italic text-sm">
          "La beauté doit sublimer, non masquer, votre vrai moi."
        </p>
        <p class="text-gray-500 text-xs mt-1">— Emma Laurent, Fondatrice</p>
      </div>
    </div>

    <!-- Texte -->
    <div class="md:w-1/2">
      <p
        class="inline-block px-3 py-1 text-xs font-medium bg-[#7e6767] text-white rounded-full mb-3"
      >
        Notre Histoire
      </p>
      <h2 class="font-serif text-3xl font-bold text-[#9c958e] mb-4">
        Conçus avec la nature, pensés pour vous
      </h2>
      <p class="text-gray-600 mb-4">
        Fondée en 2010 par Emma Laurent, Arvéa Nature est née d'une conviction simple mais forte : les produits de beauté doivent agir en harmonie avec votre peau, et non contre elle.
      </p>
      <p class="text-gray-600 mb-4">
        Notre aventure a débuté dans un petit laboratoire du sud de la France, où Emma a combiné sa formation en chimie cosmétique avec sa passion pour les ingrédients naturels.
      </p>
      <p class="text-gray-600 mb-4">
        Chaque produit Arvéa est conçu avec le plus grand soin, en utilisant des pratiques durables et des ingrédients éthiquement sourcés, respectueux de votre peau et de notre planète.
      </p>
      <a href="{{ route('about') }}" class="bg-[#493f35] text-white py-2 px-4 rounded-lg hover:bg-[#655b51] transition">
        Lire notre histoire
      </a>
    </div>
  </div>
</div>

<!-- Témoignages -->
<section class="py-16 bg-[#2e3748] text-white">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex text-center flex-col">
      <span
        class="inline-block px-3 py-1 text-xs font-medium bg-white/10 text-white rounded-full mb-3 mx-auto"
      >
        Témoignages
      </span>

      <h2
        class="font-serif text-3xl md:text-4xl font-medium text-white text-center mb-4 mx-auto"
      >
        Ce que disent nos clients
      </h2>
      <p class="text-white/80 max-w-2xl mx-auto">
        Lisez les témoignages de clients qui ont intégré les produits Arvía à leur routine beauté quotidienne.
      </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
      <!-- Carte Témoignage -->
      @foreach ([
        ['name' => 'Emily R.', 'text' => "Je ne me suis jamais sentie aussi bien dans ma peau. Les produits Arvía sont vraiment magiques !", 'job' => "Ingénieure Logiciel"],
        ['name' => 'David K.', 'text' => "La qualité des produits Arvía est incomparable. Je les utilise exclusivement maintenant.", 'job' => "Graphiste"],
        ['name' => 'Sarah T.', 'text' => "J'adore le côté durable et écoresponsable d'Arvía. Et leurs produits sont excellents !", 'job' => "Responsable Marketing"],
      ] as $testimonial)
      <div class="bg-[#384152] shadow-md rounded-md p-10">
        <div class="flex items-center justify-start mb-6">
          <span class="text-yellow-400 mr-2">&#9733;</span>
          <span class="text-yellow-400 mr-2">&#9733;</span>
          <span class="text-yellow-400 mr-2">&#9733;</span>
          <span class="text-yellow-400 mr-2">&#9733;</span>
          <span class="text-gray-400">&#9733;</span>
        </div>
        <p class="mb-6">"{{ $testimonial['text'] }}"</p>
        <h4 class="font-bold">{{ $testimonial['name'] }}</h4>
        <p class="text-sm text-white/70">{{ $testimonial['job'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
