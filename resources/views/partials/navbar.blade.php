<nav x-data="{ open: false, showSearch: false }" class="bg-[#f9f7f5] sticky top-0 z-50 shadow-sm">
  <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
    <h1 class="text-2xl font-bold text-[#7a6b5f] tracking-wide">Arvía</h1>

    {{-- Desktop Menu --}}
    <div class="hidden md:flex gap-8 text-sm uppercase font-medium tracking-wide">
      <a href="{{ url('/') }}" class="hover:text-[#7a6b5f] transition">Accueil</a>
      <a href="{{ url('/products') }}" class="hover:text-[#7a6b5f] transition">Boutique</a>
      <a href="{{ url('/about') }}" class="hover:text-[#7a6b5f] transition">A propos</a>
      <a href="{{ url('/categories') }}" class="hover:text-[#7a6b5f] transition">Categories</a>
    </div>

    {{-- Right Icons --}}
    <div class="flex items-center gap-4 text-xl text-[#7a6b5f] relative">
      <button @click="showSearch = !showSearch" class="hover:text-black transition">
        <i class="fas fa-search"></i>
      </button>

      <input
        x-show="showSearch"
        x-transition
        type="text"
        placeholder="Search..."
        class="absolute top-12 right-0 w-48 p-2 border rounded-md text-sm transition-all duration-300 shadow-md z-50 bg-white"
      />

      <!-- Wishlist -->
      <a href="{{ route('wishlist.index') }}" class="relative hover:text-black transition">
          <i class="fas fa-heart"></i>
          @php $count = Auth::check() ? Auth::user()->wishlistItems()->count() : 0; @endphp
          @if($count > 0)
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $count }}</span>
          @else
            <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
          @endif
      </a>

      @auth
        <a href="{{ route('dashboard') }}" class="hover:text-black transition">
          <i class="fas fa-user"></i>
        </a>
      @else
        <a href="{{ route('login') }}" class="hover:text-black transition">
          <i class="fas fa-user"></i>
        </a>
      @endauth

      <a href="{{ route('cart') }}" class="relative hover:text-black transition">
        <i class="fas fa-shopping-cart"></i>
        @php 
          $cartCount = \App\Models\CartItem::when(auth()->check(),
            function ($query) {
                return $query->where('user_id', auth()->id());
            },
            function ($query) {
                return $query->where('session_id', session()->getId());
            }
          )->count();
        @endphp
        <span class="absolute -top-2 -right-2 bg-green-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $cartCount }}</span>
      </a>

      <button @click="open = !open" class="md:hidden ml-2">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </div>

  {{-- Mobile Menu --}}
  <div x-show="open" x-transition class="md:hidden bg-[#f5f4f2] px-6 py-4">
    <div class="flex flex-col gap-2 text-sm">
      <a href="{{ url('/') }}" class="py-1 hover:text-[#7a6b5f]">Accueil</a>
      <a href="{{ url('/products') }}" class="py-1 hover:text-[#7a6b5f]">Boutique</a>
      <a href="{{ url('/about') }}" class="py-1 hover:text-[#7a6b5f]">A propos</a>
      <a href="{{ url('/categories') }}" class="py-1 hover:text-[#7a6b5f]">Categories</a>
    </div>
  </div>
</nav>
