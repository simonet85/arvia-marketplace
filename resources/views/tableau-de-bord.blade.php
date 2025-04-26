<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Arvía</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">
      <div class="p-6 border-b">
        <h1 class="text-2xl font-bold text-[#7a6b5f]">Arvía</h1>
      </div>
      <nav class="p-6 space-y-4 text-sm">
        <a href="./tableau-de-bord.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-home mr-2"></i>Tableau de Bord</a
        >
        <a href="./gestion-des-produits.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-box mr-2"></i>Produits</a
        >
        <a
          href="./gestion-des-categories.html"
          class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-list mr-2"></i> Catégories</a
        >
        <a
          href="./gestion-des-commandes.html"
          class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-truck mr-2"></i>Commandes</a
        >
        <a href="suivi-des-commandes.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-shipping-fast mr-2"></i>Suivi</a
        >
        <a href="notifications.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-bell mr-2"></i>Notifications</a
        >
        <a href="profil.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-user mr-2"></i>Profil</a
        >
        <a href="coursiers.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-bicycle mr-2"></i>Coursiers</a
        >
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6">
      <!-- Navbar 
      <header class="bg-white shadow-lg">
        <div class="container mx-auto p-4 flex justify-between items-center">
          <h1 class="text-2xl font-bold text-[#7a6b5f]">Arvía</h1>
          <nav class="relative">
            <button
              class="text-[#7a6b5f] hover:text-[#7a6b5f] flex items-center"
              id="dropdown-button"
              aria-label="Menu"
            >
              <i class="fas fa-user"></i>
              <i class="fas fa-chevron-down ml-2"></i>
            </button>
            <ul
              class="absolute right-0 w-48 bg-white shadow-lg py-2 hidden"
              id="dropdown-menu"
            >
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-[#7a6b5f] hover:text-[#7a6b5f]"
                  ><i class="fas fa-user mr-2"></i> Profil</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-[#7a6b5f] hover:text-[#7a6b5f]"
                  ><i class="fas fa-cog mr-2"></i> Settings</a
                >
              </li>
              <li>
                <a
                  href="#"
                  class="block px-4 py-2 text-[#7a6b5f] hover:text-[#7a6b5f]"
                  ><i class="fas fa-sign-out-alt mr-2"></i> Déconnexion</a
                >
              </li>
            </ul>
          </nav>
        </div>
      </header> -->

      <script>
        const dropdownButton = document.getElementById("dropdown-button");
        const dropdownMenu = document.getElementById("dropdown-menu");

        dropdownButton.addEventListener("click", () => {
          dropdownMenu.classList.toggle("hidden");
        });

        window.addEventListener("click", (event) => {
          if (!event.target.matches("#dropdown-button")) {
            if (!dropdownMenu.classList.contains("hidden")) {
              dropdownMenu.classList.add("hidden");
            }
          }
        });
      </script>
      <header class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-[#7a6b5f]">Tableau de Bord</h2>
        <button class="md:hidden p-2 text-[#7a6b5f]">
          <i class="fas fa-bars"></i>
        </button>
      </header>

      <!-- Stats Grid -->
      <section
        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8"
      >
        <div class="bg-white p-4 rounded shadow">
          <h3 class="text-sm text-gray-500">Commandes du jour</h3>
          <p class="text-2xl font-bold text-[#7a6b5f]">14</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h3 class="text-sm text-gray-500">Commandes totales</h3>
          <p class="text-2xl font-bold text-[#7a6b5f]">823</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h3 class="text-sm text-gray-500">Ventes totales</h3>
          <p class="text-2xl font-bold text-[#7a6b5f]">34 200€</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
          <h3 class="text-sm text-gray-500">Utilisateurs actifs</h3>
          <p class="text-2xl font-bold text-[#7a6b5f]">128</p>
        </div>
      </section>

      <!-- Commandes récentes -->
      <section class="bg-white p-6 rounded shadow">
        <h3 class="text-xl font-semibold text-[#7a6b5f] mb-4">
          Commandes récentes
        </h3>
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm">
            <thead>
              <tr class="border-b">
                <th class="py-2 text-left">#ID</th>
                <th class="py-2 text-left">Client</th>
                <th class="py-2 text-left">Montant</th>
                <th class="py-2 text-left">Statut</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="py-2">#2342</td>
                <td class="py-2">Sophie N.</td>
                <td class="py-2">120€</td>
                <td class="py-2 text-green-600">Livré</td>
              </tr>
              <tr class="border-b">
                <td class="py-2">#2343</td>
                <td class="py-2">Amadou B.</td>
                <td class="py-2">75€</td>
                <td class="py-2 text-yellow-500">En cours</td>
              </tr>
              <tr>
                <td class="py-2">#2344</td>
                <td class="py-2">Julie P.</td>
                <td class="py-2">52€</td>
                <td class="py-2 text-red-500">Annulé</td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </main>
  </body>
</html>
