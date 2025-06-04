<aside class="fixed top-0 left-0 w-64 h-screen bg-white shadow-lg hidden md:block">
  <div class="p-4 border-b">
    <h1 class="text-2xl font-bold text-[#7a6b5f]">Arvía</h1>
  </div>
  <nav class="p-6 space-y-4 text-sm">
    <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-home mr-2"></i>Tableau de Bord
    </a>
    <a href="{{ route('products.create') }}" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-box mr-2"></i>Produits
    </a>
    <a href="{{ route('categories.create') }}" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-list mr-2"></i>Catégories
    </a>
    <a href="{{ route('orders.index') }}" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-truck mr-2"></i>Commandes
    </a>
    <a href="{{ route('suivi.index') }}" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-shipping-fast mr-2"></i>Suivi
    </a>
    <a href="notifications.html" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-bell mr-2"></i>Notifications
    </a>
    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-user mr-2"></i>Profil
    </a>
    <a href="coursiers.html" class="block px-4 py-2 rounded-lg text-gray-700 transition-colors duration-200 hover:bg-gray-100 hover:text-[#7a6b5f]">
      <i class="fas fa-bicycle mr-2"></i>Coursiers
    </a>
  </nav>
</aside>
