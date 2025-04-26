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
          ><i class="fas fa-list mr-2"></i>Catégories</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-truck mr-2"></i>Commandes</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-shipping-fast mr-2"></i>Suivi</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-bell mr-2"></i>Notifications</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-user mr-2"></i>Profil</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-bicycle mr-2"></i>Coursiers</a
        >
      </nav>
    </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto p-6">
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

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6">
      <!-- Categories Management -->
      <section class="p-6">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800"> Gestion des Catégories</h2>
          <button
            onclick="openCategoryForm()"
            class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148] transition"
          >
            + Ajouter une catégorie
          </button>
        </div>

        <!-- Table categories -->
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
          <thead>
            <tr>
              <th class="px-4 py-2">Nom</th>
              <th class="px-4 py-2">Description</th>
              <th class="px-4 py-2">Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border px-4 py-2">Catégorie Exemple</td>
              <td class="border px-4 py-2">Description de l'exemple</td>
              <td class="border px-4 py-2">
                <button class="text-blue-500 hover:underline">Modifier</button>
                <button class="text-red-500 hover:underline">Supprimer</button>
              </td>
            </tr>
            <!-- More categories can be added here -->
          </tbody>
        </table>
      </section>
    </main>
    <!-- Modal pour Catégorie -->
    <div
      id="category-form-modal"
      class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50 hidden"
    >
      <div
        id="category-form-content"
        class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg transform transition-all duration-300 scale-95 opacity-0"
      >
        <div class="flex justify-between items-center mb-4">
          <h3 id="category-form-title" class="text-xl font-bold text-[#7a6b5f]">
            Ajouter une Catégorie
          </h3>
          <button
            onclick="closeCategoryForm()"
            class="text-gray-500 hover:text-gray-800"
          >
            <i class="fas fa-times"></i>
          </button>
        </div>

        <form>
          <div class="mb-4">
            <label class="block mb-1 text-sm font-medium text-gray-700"
              >Nom</label
            >
            <input
              type="text"
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]"
            />
          </div>
          <div class="mb-4">
            <label class="block mb-1 text-sm font-medium text-gray-700"
              >Description</label
            >
            <textarea
              class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]"
            ></textarea>
          </div>
          <div class="flex justify-end gap-2">
            <button
              type="button"
              onclick="closeCategoryForm()"
              class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300"
            >
              Annuler
            </button>
            <button
              type="submit"
              class="px-4 py-2 bg-[#7a6b5f] text-white rounded hover:bg-[#5e5148] transition"
            >
              Enregistrer
            </button>
          </div>
        </form>
      </div>
    </div>

    <script>
      function openCategoryForm() {
        const modal = document.getElementById("category-form-modal");
        const content = document.getElementById("category-form-content");

        modal.classList.remove("hidden");
        setTimeout(() => {
          content.classList.remove("scale-95", "opacity-0");
          content.classList.add("scale-100", "opacity-100");
        }, 10);
      }

      function closeCategoryForm() {
        const modal = document.getElementById("category-form-modal");
        const content = document.getElementById("category-form-content");

        content.classList.add("scale-95", "opacity-0");
        content.classList.remove("scale-100", "opacity-100");

        setTimeout(() => {
          modal.classList.add("hidden");
        }, 300);
      }
    </script>
  </body>
</html>
