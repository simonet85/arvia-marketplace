<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Arvía')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>

<body class="bg-[#f9f8f4] text-gray-800">
    <!-- Navbar -->
    @include('partials.navbar')

    <!-- Page Content -->
    <main>
       @yield('content')
    </main>

    <!-- Footer -->
  <footer class="bg-[#f9f5f2] text-neutral-800 py-16">
    <div class="container mx-auto px-4">
      <!-- Newsletter Section -->
      @if (request()->is('/' ) || request()->is(''))
          @include('partials.newsletter')
      @endif

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

  <script src="//unpkg.com/alpinejs" defer></script>
    @stack('scripts')
</body>
</html>
