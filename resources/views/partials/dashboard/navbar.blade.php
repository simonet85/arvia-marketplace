<nav class="bg-white p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-2xl font-bold text-[#7a6b5f]">Arvía</a>
        <div class="flex items-center gap-4 text-xl text-[#7a6b5f]">
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
            <a href="{{ url('/wishlist') }}" class="relative hover:text-black transition">
                <i class="fas fa-heart"></i>
                <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
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
            <a href="list-commande.html" class="relative hover:text-black transition">
                <i class="fas fa-shopping-cart"></i>
                <span class="absolute -top-2 -right-2 bg-green-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
            </a>
            <button @click="open = !open" class="md:hidden ml-2">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
    <!-- Dropdown Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden md:block mt-2">
        <ul class="bg-white shadow-lg rounded-lg">
            <li><a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profil</a></li>
          
            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Réglages</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        Déconnexion
                    </a>
                </form>
            </li>
        </ul>
    </div>
</nav>

