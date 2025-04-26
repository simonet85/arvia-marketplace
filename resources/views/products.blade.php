@extends('layouts.app')
@section('content')
    <section
      class="bg-cover bg-center h-[400px] md:h-[600px] flex items-center justify-center text-center text-white relative"
    >
      <div class="bg-black bg-opacity-[0.5] p-12 rounded-md md:p-16">
        <span
          class="font-serif text-4xl md:text-6xl font-bold text-white mb-6 md:mb-12"
          >Our Products</span
        >
        <p
          class="text-white/80 max-w-3xl mx-auto leading-relaxed md:text-2xl md:leading-relaxed md:max-w-2xl"
        >
          Discover our collection of luxurious cosmetics, designed to enhance
          your natural beauty.
        </p>
      </div>
    </section>
    <!-- add search field with icon -->
    <div class="flex justify-center mt-4 mb-8">
      <input
        type="text"
        placeholder="Search for products..."
        class="border border-gray-300 rounded-lg p-2 w-full max-w-md focus:outline-none focus:ring focus:ring-[#493f35]"
      />
      <button class="bg-[#493f35] text-white rounded-lg px-4 py-2 ml-2">
        <i class="fas fa-search"></i>
      </button>
    </div>
    <div class="flex flex-col lg:flex-row max-w-7xl mx-auto px-4 py-8 gap-6">
      <!-- Sidebar Filters -->
      <aside class="w-full lg:w-1/4 bg-white shadow-md rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Filters</h2>

        <!-- Category Filter -->
        <div class="mb-6">
          <h3 class="font-semibold mb-2">Category</h3>
          <ul class="space-y-2" id="category-filters">
            <li>
              <label class="flex items-center">
                <input
                  type="checkbox"
                  value="Skin Care"
                  class="form-checkbox text-[#493f35] mr-2 category"
                />
                Skin Care
              </label>
            </li>
            <li>
              <label class="flex items-center">
                <input
                  type="checkbox"
                  value="Makeup"
                  class="form-checkbox text-[#493f35] mr-2 category"
                />
                Makeup
              </label>
            </li>
            <li>
              <label class="flex items-center">
                <input
                  type="checkbox"
                  value="Perfume"
                  class="form-checkbox text-[#493f35] mr-2 category"
                />
                Perfume
              </label>
            </li>
            <li>
              <label class="flex items-center">
                <input
                  type="checkbox"
                  value="Hair Care"
                  class="form-checkbox text-[#493f35] mr-2 category"
                />
                Hair Care
              </label>
            </li>
          </ul>
        </div>

        <!-- Price Range Filter -->
        <div class="mb-6">
          <h3 class="font-semibold mb-2">Price Range</h3>
          <input
            id="price-range"
            type="range"
            min="0"
            max="100"
            value="100"
            class="w-full accent-[#493f35]"
          />
          <div class="flex justify-between text-sm mt-1">
            <span>$0</span><span>$100</span>
          </div>
        </div>

        <!-- Skin Type Filter -->
        <div class="mb-6">
          <h3 class="font-semibold mb-2">Skin Type</h3>
          <select
            id="skin-type"
            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-[#493f35]"
          >
            <option value="">All Skin Types</option>
            <option value="Dry Skin">Dry Skin</option>
            <option value="Oily Skin">Oily Skin</option>
            <option value="Sensitive Skin">Sensitive Skin</option>
          </select>
        </div>

        <!-- Bestsellers Filter -->
        <div>
          <h3 class="font-semibold mb-2">Bestsellers</h3>
          <label class="flex items-center">
            <input
              id="bestseller"
              type="checkbox"
              class="form-checkbox text-[#493f35] mr-2"
            />
            Show Bestsellers Only
          </label>
        </div>
      </aside>

      <!-- Main Content -->
      <main class="w-full lg:w-3/4">
        <!-- Sorting + Pagination -->
        <div
          class="flex justify-between items-center bg-white shadow-md rounded-lg p-4 mb-6"
        >
          <select
            id="sort-options"
            class="border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring focus:ring-[#493f35]"
          >
            <option value="">Sort By: Default</option>
            <option value="price-asc">Price: Low to High</option>
            <option value="price-desc">Price: High to Low</option>
            <option value="newest">Newest Arrivals</option>
            <option value="popular">Popularity</option>
          </select>

          <div class="flex space-x-2 items-center">
            <button
              class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"
            >
              <i class="fas fa-chevron-left"></i>
            </button>
            <button class="px-3 py-1 rounded-lg bg-[#493f35] text-white">
              1
            </button>
            <button
              class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"
            >
              2
            </button>
            <button
              class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"
            >
              3
            </button>
            <button
              class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"
            >
              <i class="fas fa-chevron-right"></i>
            </button>
          </div>
        </div>

        <!-- Product Grid -->
        <section
          id="product-grid"
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
        >
          <!-- Products will be rendered here -->
          <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
            <a href="fiche-produit.blade.php">
              <img
                src="https://via.placeholder.com/300x300"
                alt="Product Name"
                class="w-full h-60 object-cover rounded-md mb-4"
              />
              <h3 class="text-lg font-semibold mb-2">Product Name</h3>
              <p class="text-sm text-gray-500 mb-2">Skin Type</p>
              <div class="flex items-center">
                <span class="text-[#493f35] font-bold">$29.99</span>
                <button
                  class="text-sm bg-[#493f35] text-white px-4 py-1 rounded-lg hover:bg-[#3e352c] ml-auto"
                >
                  Add to Cart
                </button>
              </div>
            </a>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
            <a href="fiche-produit.blade.php">
              <img
                src="https://via.placeholder.com/300x300"
                alt="Product Name"
                class="w-full h-60 object-cover rounded-md mb-4"
              />
              <h3 class="text-lg font-semibold mb-2">Product Name</h3>
              <p class="text-sm text-gray-500 mb-2">Skin Type</p>
              <div class="flex items-center">
                <span class="text-[#493f35] font-bold">$19.99</span>
                <button
                  class="text-sm bg-[#493f35] text-white px-4 py-1 rounded-lg hover:bg-[#3e352c] ml-auto"
                >
                  Add to Cart
                </button>
              </div>
            </a>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
            <a href="fiche-produit.blade.php">
              <img
                src="https://via.placeholder.com/300x300"
                alt="Product Name"
                class="w-full h-60 object-cover rounded-md mb-4"
              />
              <h3 class="text-lg font-semibold mb-2">Product Name</h3>
              <p class="text-sm text-gray-500 mb-2">Skin Type</p>
              <div class="flex items-center">
                <span class="text-[#493f35] font-bold">$24.99</span>
                <button
                  class="text-sm bg-[#493f35] text-white px-4 py-1 rounded-lg hover:bg-[#3e352c] ml-auto"
                >
                  Add to Cart
                </button>
              </div>
            </a>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
            <a href="fiche-produit.blade.php">
              <img
                src="https://via.placeholder.com/300x300"
                alt="Product Name"
                class="w-full h-60 object-cover rounded-md mb-4"
              />
              <h3 class="text-lg font-semibold mb-2">Product Name</h3>
              <p class="text-sm text-gray-500 mb-2">Skin Type</p>
              <div class="flex items-center">
                <span class="text-[#493f35] font-bold">$49.99</span>
                <button
                  class="text-sm bg-[#493f35] text-white px-4 py-1 rounded-lg hover:bg-[#3e352c] ml-auto"
                >
                  Add to Cart
                </button>
              </div>
            </a>
          </div>
          <div class="bg-white rounded-lg shadow-md p-4 flex flex-col">
            <a href="fiche-produit.blade.php">
              <img
                src="https://via.placeholder.com/300x300"
                alt="Product Name"
                class="w-full h-60 object-cover rounded-md mb-4"
              />
              <h3 class="text-lg font-semibold mb-2">Product Name</h3>
              <p class="text-sm text-gray-500 mb-2">Skin Type</p>
              <div class="flex items-center">
                <span class="text-[#493f35] font-bold">$39.99</span>
                <button
                  class="text-sm bg-[#493f35] text-white px-4 py-1 rounded-lg hover:bg-[#3e352c] ml-auto"
                >
                  Add to Cart
                </button>
              </div>
            </a>
          </div>
        </section>
      </main>
    </div>
  @include('partials.footer')
  <script>
    // Sample product data (to be replaced with dynamic data from a database or API)
    const products = [
      {
        id: 1,
        name: "Hydrating Face Cream",
        category: "Skin Care",
        price: 29.99,
        skinType: "Dry Skin",
        image: "https://via.placeholder.com/300x300",
        bestseller: true,
        popular: true,
        dateAdded: "2024-12-15",
      },
      {
        id: 2,
        name: "Gentle Cleanser",
        category: "Skin Care",
        price: 19.99,
        skinType: "Sensitive Skin",
        image: "https://via.placeholder.com/300x300",
        bestseller: false,
        popular: false,
        dateAdded: "2025-01-01",
      },
      {
        id: 3,
        name: "Matte Foundation",
        category: "Makeup",
        price: 24.99,
        skinType: "Oily Skin",
        image: "https://via.placeholder.com/300x300",
        bestseller: true,
        popular: true,
        dateAdded: "2025-02-15",
      },
      {
        id: 4,
        name: "Vanilla Perfume",
        category: "Perfume",
        price: 49.99,
        skinType: "",
        image: "https://via.placeholder.com/300x300",
        bestseller: false,
        popular: true,
        dateAdded: "2025-03-10",
      },
    ];

    // Toggle Mobile Menu
    document
      .getElementById("mobile-menu-button")
      .addEventListener("click", () => {
        const menu = document.getElementById("mobile-menu-content");
        menu.classList.toggle("hidden");
      });

    // Toggle Search Input
    document.getElementById("search-toggle").addEventListener("click", () => {
      const input = document.getElementById("search-input");
      input.classList.toggle("hidden");
      input.focus();
    });

    // Optionnel : compteur dynamique (à remplacer avec des données dynamiques)
    const wishlistCount = 2; // à remplacer par données réelles
    const cartCount = 3; // idem

    document.getElementById("wishlist-count").innerText = wishlistCount;
    document.getElementById("cart-count").innerText = cartCount;

    const productGrid = document.getElementById("product-grid");

    const renderProducts = (filtered) => {
      productGrid.innerHTML = "";
      if (filtered.length === 0) {
        productGrid.innerHTML =
          "<p class='col-span-full text-center'>No products found.</p>";
      }

      filtered.forEach((product) => {
        const card = document.createElement("div");
        card.className = "bg-white rounded-lg shadow-md p-4 flex flex-col";
        card.innerHTML = `
          <a href="fiche-produit.blade.php">
            <img src="${product.image}" alt="${
          product.name
        }" class="w-full h-60 object-cover rounded-md mb-4" />
          <h3 class="text-lg font-semibold mb-2">${product.name}</h3>
          <p class="text-sm text-gray-500 mb-2">${
            product.skinType || "All Skin Types"
          }</p>
          <div class="flex items-center justify-between mt-auto">
            <span class="text-[#493f35] font-bold">$${product.price.toFixed(
              2
            )}</span>
            <button class="text-sm bg-[#493f35] text-white px-4 py-1 rounded-lg hover:bg-[#3e352c]">Add to Cart</button>
          </div>
        `;
        productGrid.appendChild(card);
      });
    };

    const filterProducts = () => {
      const selectedCategories = [
        ...document.querySelectorAll(".category:checked"),
      ].map((el) => el.value);
      const maxPrice = document.getElementById("price-range").value;
      const selectedSkin = document.getElementById("skin-type").value;
      const bestsellerOnly = document.getElementById("bestseller").checked;
      const sortBy = document.getElementById("sort-options").value;

      let result = [...products];

      // Filter
      if (selectedCategories.length > 0) {
        result = result.filter((p) => selectedCategories.includes(p.category));
      }

      result = result.filter((p) => p.price <= maxPrice);

      if (selectedSkin) {
        result = result.filter((p) => p.skinType === selectedSkin);
      }

      if (bestsellerOnly) {
        result = result.filter((p) => p.bestseller);
      }

      // Sort
      switch (sortBy) {
        case "price-asc":
          result.sort((a, b) => a.price - b.price);
          break;
        case "price-desc":
          result.sort((a, b) => b.price - a.price);
          break;
        case "newest":
          result.sort((a, b) => new Date(b.dateAdded) - new Date(a.dateAdded));
          break;
        case "popular":
          result = result.filter((p) => p.popular);
          break;
      }

      renderProducts(result);
    };

    // Attach Events
    document
      .querySelectorAll("input, select")
      .forEach((el) => el.addEventListener("input", filterProducts));

    // Initial render
    renderProducts(products);
  </script>
@endsection
