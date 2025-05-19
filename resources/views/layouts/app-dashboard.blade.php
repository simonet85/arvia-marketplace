<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- toastify css cdn  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- toastify js cnd  -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <style>
      .container {
        @apply max-w-7xl mx-auto px-6 py-4 sm:px-6 lg:px-8;
      }
      .fade-out {
          animation: fadeOut 0.3s ease-out forwards;
      }

      @keyframes fadeOut {
          from {
              opacity: 1;
              transform: scale(1);
          }
          to {
              opacity: 0;
              transform: scale(0.95);
          }
      }

    </style>

    <title>@yield('title', 'Tableau de bord')</title>

  @section('content')
  </head>
  <body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    @include('partials.dashboard.sidebar')
    <div class="container">
    <!-- Navbar -->
    <nav class="bg-white shadow mb-6">
      <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
          <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

            <div class="hidden sm:block sm:ml-6">
              <div class="flex space-x-4">
                <a href="{{ url('/') }}" class="text-gray-900 hover:text-[#7a6b5f]">Accueil</a>
                <a href="{{ url('/profil') }}" class="text-gray-900 hover:text-[#7a6b5f]">Profil</a>
                <a href="{{ url('/settings') }}" class="text-gray-900 hover:text-[#7a6b5f]">Réglages</a>
              </div>
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0" x-data="{ open: false }">
            <div class="relative" @mouseenter="open = true" @mouseleave="open = false">
            {{-- auth()->user()->profile_photo_url --}}
              <img src="#" class="h-12 w-12 rounded-full" alt="Photo de profil" />
              <div class="absolute top-12 right-0 bg-white shadow-lg rounded w-48 p-2" x-show="open" x-transition>
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Réglages</a>
                <a href="{{ route('logout') }}" class="block px-4 py-2 hover:bg-gray-100" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Déconnexion</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6">
      @yield('content')
    </main>
    </div>
    <script src="//unpkg.com/alpinejs"></script>
    @stack('scripts')
  </body>
</html>
