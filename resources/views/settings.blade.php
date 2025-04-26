<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Réglages du site - Arvía</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  </head>
  <body class="flex flex-col min-h-screen bg-gray-100">
    <!-- Navbar  -->
    <header class="bg-white shadow-lg">
      <div class="container mx-auto p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-[#7a6b5f]">Arvía</h1>
        <nav class="relative">
          <button
            class="text-[#7a6b5f] hover:text-[#7a6b5f] flex items-center gap-2"
            id="dropdown-button"
            aria-label="Menu"
          >
            <img
              src="/images/user.jpg"
              alt="Photo de profil"
              class="w-8 h-8 rounded-full object-cover"
            />
            <i class="fas fa-chevron-down"></i>
          </button>
          <ul
            class="absolute right-0 w-48 bg-white shadow-lg py-2 hidden z-10"
            id="dropdown-menu"
          >
            <li>
              <a
                href="#"
                class="block px-4 py-2 text-[#7a6b5f] hover:text-[#7a6b5f]"
              >
                <i class="fas fa-user mr-2"></i> Profil
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block px-4 py-2 text-[#7a6b5f] hover:text-[#7a6b5f]"
              >
                <i class="fas fa-cog mr-2"></i> Settings
              </a>
            </li>
            <li>
              <a
                href="#"
                class="block px-4 py-2 text-[#7a6b5f] hover:text-[#7a6b5f]"
              >
                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="flex flex-1 flex-col md:flex-row">
      <!-- Sidebar -->
      <aside class="w-full md:w-64 bg-white shadow-lg hidden md:block">
        <div class="p-6 border-b">
          <h1 class="text-2xl font-bold text-[#7a6b5f]">Arvía</h1>
        </div>
        <nav class="p-6 space-y-4 text-sm">
          <a href="./tableau-de-bord.html" class="block hover:text-[#7a6b5f]">
            <i class="fas fa-home mr-2"></i>Tableau de Bord
          </a>
          <a
            href="./gestion-des-produits.html"
            class="block hover:text-[#7a6b5f]"
          >
            <i class="fas fa-box mr-2"></i>Produits
          </a>
          <a
            href="./gestion-des-categories.html"
            class="block hover:text-[#7a6b5f]"
          >
            <i class="fas fa-list mr-2"></i>Catégories
          </a>
          <a
            href="./gestion-des-commandes.html"
            class="block hover:text-[#7a6b5f]"
          >
            <i class="fas fa-truck mr-2"></i>Commandes
          </a>
          <a href="suivi-des-commandes.html" class="block hover:text-[#7a6b5f]">
            <i class="fas fa-shipping-fast mr-2"></i>Suivi
          </a>
          <a href="notifications.html" class="block hover:text-[#7a6b5f]">
            <i class="fas fa-bell mr-2"></i>Notifications
          </a>
          <a href="profil.html" class="block hover:text-[#7a6b5f]">
            <i class="fas fa-user mr-2"></i>Profil
          </a>
          <a href="coursiers.html" class="block hover:text-[#7a6b5f]">
            <i class="fas fa-bicycle mr-2"></i>Coursiers
          </a>
          <a href="reglages.html" class="block font-semibold text-[#7a6b5f]">
            <i class="fas fa-cog mr-2"></i>Réglages
          </a>
        </nav>
      </aside>

      <!-- Main Content -->
      <main class="flex-1 overflow-y-auto p-4 sm:p-6">
        <header
          class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4"
        >
          <h2 class="text-2xl font-bold text-[#7a6b5f]">Réglages du site</h2>
        </header>

        <!-- Onglets -->
        <div class="mb-6 border-b border-gray-200 overflow-x-auto">
          <nav
            class="flex flex-wrap sm:flex-nowrap space-x-4 sm:space-x-6 text-sm"
          >
            <button
              class="tab-link text-[#7a6b5f] font-medium border-b-2 border-[#7a6b5f] pb-2 whitespace-nowrap"
              data-tab="general"
            >
              Informations générales
            </button>
            <button
              class="tab-link text-gray-500 hover:text-[#7a6b5f] pb-2 whitespace-nowrap"
              data-tab="paiement"
            >
              Paiement
            </button>
            <button
              class="tab-link text-gray-500 hover:text-[#7a6b5f] pb-2 whitespace-nowrap"
              data-tab="social"
            >
              Réseaux sociaux
            </button>
          </nav>
        </div>

        <!-- Contenu Onglets -->
        <div id="tab-content">
          <!-- Onglet Informations Générales -->
          <div id="general" class="tab-pane">
            <form class="space-y-6 bg-white p-4 sm:p-6 rounded-lg shadow">
              <div>
                <label class="block text-sm font-medium">Nom du site</label>
                <input
                  type="text"
                  class="mt-1 w-full p-3 border rounded"
                  placeholder="Arvía Nature"
                />
              </div>
              <div>
                <label class="block text-sm font-medium"
                  >Email de contact</label
                >
                <input
                  type="email"
                  class="mt-1 w-full p-3 border rounded"
                  placeholder="contact@arvia.com"
                />
              </div>
              <div>
                <label class="block text-sm font-medium">Logo actuel</label>
                <img
                  src="/images/logo-arvia.png"
                  alt="Logo"
                  class="w-32 h-auto mt-2"
                />
              </div>
              <div>
                <label class="block text-sm font-medium">Nouveau logo</label>
                <input type="file" class="mt-1 block w-full text-sm" />
              </div>
              <button
                type="submit"
                class="bg-[#7a6b5f] text-white px-6 py-2 rounded"
              >
                Enregistrer
              </button>
            </form>
          </div>

          <!-- Onglet Paiement -->
          <div id="paiement" class="tab-pane hidden">
            <div class="bg-white p-4 sm:p-6 rounded shadow">
              <p class="text-sm text-gray-700">
                Paramètres de paiement à venir...
              </p>
            </div>
          </div>

          <!-- Onglet Réseaux Sociaux -->
          <div id="social" class="tab-pane hidden">
            <div class="bg-white p-4 sm:p-6 rounded shadow space-y-4">
              <div>
                <label class="block text-sm font-medium">Facebook</label>
                <input
                  type="url"
                  class="mt-1 w-full p-3 border rounded"
                  placeholder="https://facebook.com/arvia"
                />
              </div>
              <div>
                <label class="block text-sm font-medium">Instagram</label>
                <input
                  type="url"
                  class="mt-1 w-full p-3 border rounded"
                  placeholder="https://instagram.com/arvia"
                />
              </div>
              <button class="bg-[#7a6b5f] text-white px-6 py-2 rounded">
                Enregistrer
              </button>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script>
      const tabs = document.querySelectorAll(".tab-link");
      const panes = document.querySelectorAll(".tab-pane");

      tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
          tabs.forEach((t) =>
            t.classList.remove(
              "text-[#7a6b5f]",
              "font-medium",
              "border-b-2",
              "border-[#7a6b5f]"
            )
          );
          panes.forEach((p) => p.classList.add("hidden"));

          tab.classList.add(
            "text-[#7a6b5f]",
            "font-medium",
            "border-b-2",
            "border-[#7a6b5f]"
          );
          document.getElementById(tab.dataset.tab).classList.remove("hidden");
        });
      });

      const dropdownBtn = document.getElementById("dropdown-button");
      const dropdownMenu = document.getElementById("dropdown-menu");

      dropdownBtn.addEventListener("click", () => {
        dropdownMenu.classList.toggle("hidden");
      });

      window.addEventListener("click", (e) => {
        if (
          !dropdownBtn.contains(e.target) &&
          !dropdownMenu.contains(e.target)
        ) {
          dropdownMenu.classList.add("hidden");
        }
      });
    </script>
  </body>
</html>
