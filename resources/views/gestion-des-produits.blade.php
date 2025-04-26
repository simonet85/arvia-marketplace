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
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-home mr-2"></i>Tableau de Bord</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-box mr-2"></i>Produits</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-list mr-2"></i> Catégories</a
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

      <!-- produits.html -->
      <section class="p-6">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800">Gestion des Produits</h2>
          <button
            onclick="openForm()"
            class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148] transition"
          >
            + Ajouter un produit
          </button>
        </div>

        <!-- Table produits -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
          <table class="min-w-full table-auto text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-xs uppercase">
              <tr>
                <th class="px-6 py-3">#</th>
                <th class="px-6 py-3">Nom</th>
                <th class="px-6 py-3">Catégorie</th>
                <th class="px-6 py-3">Prix</th>
                <th class="px-6 py-3">Stock</th>
                <th class="px-6 py-3">Photo</th>
                <th class="px-6 py-3">Actions</th>
              </tr>
            </thead>
            <tbody id="product-table-body">
              <!-- Exemple de produit -->
              <tr class="border-b hover:bg-gray-50">
                <td class="px-6 py-4">1</td>
                <td class="px-6 py-4">Crème Visage</td>
                <td class="px-6 py-4">Soins</td>
                <td class="px-6 py-4">12,00 €</td>
                <td class="px-6 py-4">35</td>
                <td class="px-6 py-4">
                  <img
                    src="https://picsum.photos/200/300"
                    alt="Photo du produit"
                    class="w-10 h-10 rounded-full"
                  />
                </td>
                <td class="px-6 py-4 flex gap-2">
                  <button
                    onclick="openModifyModal()"
                    class="text-blue-600 hover:underline"
                  >
                    Modifier
                  </button>
                  <button
                    onclick="openDeleteModal()"
                    class="text-red-600 hover:underline"
                  >
                    Supprimer
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Formulaire modal -->
        <div
          id="product-form-modal"
          class="fixed inset-0 bg-black bg-opacity-30 hidden flex justify-center items-center z-50"
        >
          <div
            class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg transform transition-all duration-300 scale-95 opacity-0"
            id="product-form-content"
          >
            <h3 class="text-xl font-semibold mb-4" id="form-title">
              Ajouter un produit
            </h3>
            <form id="product-form" onsubmit="submitProductForm(event)">
              <div class="mb-4">
                <label class="block mb-1">Nom du produit</label>
                <input
                  type="text"
                  id="product-name"
                  required
                  class="w-full border rounded px-3 py-2"
                />
              </div>
              <div class="mb-4">
                <label class="block mb-1">Catégorie</label>
                <input
                  type="text"
                  id="product-category"
                  required
                  class="w-full border rounded px-3 py-2"
                />
              </div>
              <div class="mb-4">
                <label class="block mb-1">Prix (€)</label>
                <input
                  type="number"
                  id="product-price"
                  step="0.01"
                  required
                  class="w-full border rounded px-3 py-2"
                />
              </div>
              <div class="mb-4">
                <label class="block mb-1">Stock</label>
                <input
                  type="number"
                  id="product-stock"
                  required
                  class="w-full border rounded px-3 py-2"
                />
              </div>
              <div class="mb-4">
                <label class="block mb-1">Photo</label>
                <input
                  type="file"
                  id="product-photo"
                  required
                  class="w-full border rounded px-3 py-2"
                />
              </div>
              <div class="flex justify-end gap-3">
                <button
                  type="button"
                  onclick="closeForm()"
                  class="text-gray-600 hover:underline"
                >
                  Annuler
                </button>
                <button
                  type="submit"
                  class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148] transition"
                >
                  Enregistrer
                </button>
              </div>
            </form>
          </div>
        </div>
        <!-- Fin du formulaire modal -->
        <!-- Modal suppression -->
        <div
          id="delete-modal"
          class="fixed inset-0 bg-black bg-opacity-30 hidden flex justify-center items-center z-50"
        >
          <div
            class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg transform transition-all duration-300 scale-95 opacity-0"
            id="delete-modal-content"
          >
            <h3 class="text-xl font-semibold mb-4">Suppression du produit</h3>
            <p class="mb-4">Êtes-vous sûr de vouloir supprimer ce produit ?</p>
            <div class="flex justify-end gap-3">
              <button
                type="button"
                onclick="closeDeleteModal()"
                class="text-gray-600 hover:underline"
              >
                Annuler
              </button>
              <button
                type="button"
                onclick="deleteProduct()"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition"
              >
                Supprimer
              </button>
            </div>
          </div>
        </div>
      </section>
      <!-- Fin de la section produits.html -->
    </main>
  </body>
  <script>
    function openForm() {
      const modal = document.getElementById("product-form-modal");
      const content = document.getElementById("product-form-content");
      modal.classList.remove("hidden");
      setTimeout(() => {
        content.classList.remove("scale-95", "opacity-0");
      }, 0);
    }

    function closeForm() {
      const modal = document.getElementById("product-form-modal");
      const content = document.getElementById("product-form-content");
      content.classList.add("scale-95", "opacity-0");
      setTimeout(() => {
        modal.classList.add("hidden");
      }, 300);
    }

    function openModifyModal() {
      document.getElementById("form-title").textContent = "Modifier le produit";
      openForm();
    }

    function openDeleteModal() {
      if (confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
        // Logic to delete the product
      }
    }

    function submitProductForm(event) {
      event.preventDefault();
      closeForm();
      // Logic to handle form submission
    }

    function openDeleteModal() {
      const modal = document.getElementById("delete-modal");
      const content = document.getElementById("delete-modal-content");
      modal.classList.remove("hidden");
      setTimeout(() => {
        content.classList.remove("scale-95", "opacity-0");
      }, 0);
    }

    function closeDeleteModal() {
      const modal = document.getElementById("delete-modal");
      const content = document.getElementById("delete-modal-content");
      content.classList.add("scale-95", "opacity-0");
      setTimeout(() => {
        modal.classList.add("hidden");
      }, 300);
    }

    function deleteProduct() {
      // Logic to delete the product
      closeDeleteModal();
    }
  </script>
</html>
