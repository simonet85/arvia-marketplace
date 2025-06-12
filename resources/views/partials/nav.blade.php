<nav class="bg-[#f9f7f5] sticky top-0 z-50 shadow-sm">
      <div
        class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between"
      >
        <a href="{{url('/');}}" class="text-2xl font-bold text-[#7a6b5f] tracking-wide">
          <!-- <img src="{{asset('images/logo.png')}}" alt="Arvía Logo" class="inline-block h-8 mr-2"> -->
          Arvía
        </a>
        <div
          class="hidden md:flex gap-8 text-sm uppercase font-medium tracking-wide"
        >
          <a href="{{url('/');}}" class="hover:text-[#7a6b5f] transition">Accueil</a>
          <a href="{{url('/products');}}" class="hover:text-[#7a6b5f] transition"
            >Produits</a
          >
          <a href="{{url('/about');}}" class="hover:text-[#7a6b5f] transition">A propos</a>
          <a href="{{url('/categories');}}" class="hover:text-[#7a6b5f] transition"
            >Categories</a
          >
        </div>
        <!-- Right icons -->
        <!-- <div x-data="{
          wishlistCount: (JSON.parse(localStorage.getItem('wishlist') || '[]')).length,
          init() {
            window.addEventListener('wishlist-updated', () => {
                this.wishlistCount = (JSON.parse(localStorage.getItem('wishlist') || '[]')).length;
            });
          }
        }" x-init="init()"  class="flex items-center gap-4 text-xl text-[#7a6b5f] relative"> -->
          <!-- Search Toggle -->
          <button id="search-toggle" class="hover:text-black transition">
            <i class="fas fa-search"></i>
          </button>

          <!-- Search Input (hidden by default) -->
          <input
            type="text"
            id="search-input"
            placeholder="Search..."
            class="absolute top-12 right-0 w-48 p-2 border rounded-md text-sm hidden transition-all duration-300 shadow-md z-50"
          />

          <!-- Wishlist -->
          <a href="{{ route('wishlist.index') }}" class="relative hover:text-black transition">
              <i class="fas fa-heart"></i>
              @php $count = Auth::user()->wishlistItems()->count(); @endphp
              @if($count > 0)
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">{{ $count }}</span>
              @endif
          </a>

          <!-- User Account -->
          <a href="connexion.html" class="hover:text-black transition">
            <i class="fas fa-user"></i>
          </a>

          <!-- Cart -->
          <a
            href="list-commande.html"
            class="relative hover:text-black transition"
          >
            <i class="fas fa-shopping-cart"></i>
            <span
              id="cart-count"
              class="absolute -top-2 -right-2 bg-green-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center"
              >3</span
            >
          </a>

          <!-- Mobile menu toggle -->
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
          <a href="{{url('/');}}" class="py-1 hover:text-[#7a6b5f]">Home</a>
          <a href="{{url('/products');}}" class="py-1 hover:text-[#7a6b5f]">Products</a>
          <a href="{{url('/about');}}" class="py-1 hover:text-[#7a6b5f]">About</a>
          <a href="{{url('/categories');}}" class="py-1 hover:text-[#7a6b5f]">Categories</a>
        </div>
      </div>
    </nav>
