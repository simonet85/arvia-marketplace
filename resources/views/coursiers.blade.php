<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Arvía - Coursiers</title>
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
      <div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6">
          <i class="fas fa-bicycle mr-2"></i> Gestion des Coursiers
        </h1>

        <!-- Barre de recherche -->
        <div class="flex justify-between items-center mb-4">
          <input
            type="text"
            id="search-input"
            oninput="filterCoursiers()"
            placeholder="🔍 Rechercher par nom, téléphone ou zone..."
            class="p-2 border rounded w-full max-w-sm"
          />
          <button
            onclick="showAddModal()"
            class="ml-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
          >
            + Ajouter un coursier
          </button>
        </div>

        <!-- Tableau des coursiers -->
        <div class="overflow-x-auto">
          <table class="w-full border-collapse">
            <thead class="bg-gray-200">
              <tr>
                <th class="px-4 py-2 text-left">Nom</th>
                <th class="px-4 py-2 text-left">Téléphone</th>
                <th class="px-4 py-2 text-left">Zone</th>
                <th class="px-4 py-2 text-left">Actions</th>
              </tr>
            </thead>
            <tbody id="coursiers-table" class="bg-white"></tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div
          class="flex justify-center mt-4 gap-2"
          id="pagination-controls"
        ></div>
      </div>

      <!-- Modal Ajouter/Modifier -->
      <div
        id="modal-courier"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50"
      >
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
          <h2 class="text-xl font-semibold mb-4" id="modal-title">
            Ajouter un coursier
          </h2>
          <form id="form-courier">
            <div class="mb-4">
              <label class="block mb-1">Nom :</label>
              <input
                type="text"
                id="nom"
                required
                class="w-full border px-3 py-2 rounded"
              />
            </div>
            <div class="mb-4">
              <label class="block mb-1">Téléphone :</label>
              <input
                type="text"
                id="telephone"
                required
                class="w-full border px-3 py-2 rounded"
              />
            </div>
            <div class="mb-4">
              <label class="block mb-1">Zone :</label>
              <input
                type="text"
                id="zone"
                required
                class="w-full border px-3 py-2 rounded"
              />
            </div>
            <div class="flex justify-end gap-2">
              <button
                type="button"
                onclick="closeModal('modal-courier')"
                class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
              >
                Annuler
              </button>
              <button
                type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
              >
                Enregistrer
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Modal Confirmation Suppression -->
      <div
        id="modal-delete"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50"
      >
        <div class="bg-white rounded-lg p-6 w-full max-w-sm text-center">
          <h2 class="text-lg font-semibold mb-4">Supprimer ce coursier ?</h2>
          <p class="mb-6 text-gray-600">Cette action est irréversible.</p>
          <div class="flex justify-center gap-4">
            <button
              onclick="closeModal('modal-delete')"
              class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400"
            >
              Annuler
            </button>
            <button
              onclick="confirmDeleteCourier()"
              class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
            >
              Supprimer
            </button>
          </div>
        </div>
      </div>
    </main>

    <script>
      let coursiers = [
        { nom: "Ali Koné", telephone: "07 99 88 77 66", zone: "Zone Sud" },
        { nom: "Awa Traoré", telephone: "05 55 33 22 11", zone: "Zone Nord" },
        {
          nom: "Koffi Yao",
          telephone: "01 22 11 00 99",
          zone: "Zone Centre",
        },
        {
          nom: "Fatou Diabaté",
          telephone: "07 77 77 77 77",
          zone: "Zone Est",
        },
        {
          nom: "Bakary Doumbia",
          telephone: "01 33 33 33 33",
          zone: "Zone Ouest",
        },
        {
          nom: "Mariama Camara",
          telephone: "05 44 44 44 44",
          zone: "Zone Nord",
        },
        {
          nom: "Ismael Touré",
          telephone: "07 22 22 22 22",
          zone: "Zone Sud",
        },
        {
          nom: "Nadia Ouattara",
          telephone: "01 11 11 11 11",
          zone: "Zone Centre",
        },
        {
          nom: "Souleymane Fofana",
          telephone: "05 66 66 66 66",
          zone: "Zone Est",
        },
        {
          nom: "Djeneba Coulibaly",
          telephone: "07 33 33 33 33",
          zone: "Zone Nord",
        },
        {
          nom: "Yacouba Cissé",
          telephone: "01 55 55 55 55",
          zone: "Zone Ouest",
        },
      ];
      let filteredCoursiers = [...coursiers];
      let currentPage = 1;
      const rowsPerPage = 10;
      let editIndex = null;
      let deleteIndex = null;

      function renderCoursiers() {
        const tbody = document.getElementById("coursiers-table");
        tbody.innerHTML = "";
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const coursiersToShow = filteredCoursiers.slice(start, end);

        coursiersToShow.forEach((c, i) => {
          tbody.innerHTML += `
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2">${c.nom}</td>
                <td class="px-4 py-2">${c.telephone}</td>
                <td class="px-4 py-2">${c.zone}</td>
                <td class="px-4 py-2 space-x-2">
                  <button onclick="editCourier(${coursiers.indexOf(
                    c
                  )})" class="text-blue-600 hover:underline">Modifier</button>
                  <button onclick="showDeleteModal(${coursiers.indexOf(
                    c
                  )})" class="text-red-600 hover:underline">Supprimer</button>
                </td>
              </tr>
            `;
        });

        renderPaginationControls();
      }

      function renderPaginationControls() {
        const totalPages = Math.ceil(filteredCoursiers.length / rowsPerPage);
        const container = document.getElementById("pagination-controls");
        container.innerHTML = "";

        if (totalPages <= 1) return;

        if (currentPage > 1) {
          container.innerHTML += `<button onclick="changePage(${
            currentPage - 1
          })" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">←</button>`;
        }

        for (let i = 1; i <= totalPages; i++) {
          container.innerHTML += `<button onclick="changePage(${i})" class="px-3 py-1 ${
            i === currentPage ? "bg-blue-600 text-white" : "bg-gray-200"
          } rounded hover:bg-gray-300">${i}</button>`;
        }

        if (currentPage < totalPages) {
          container.innerHTML += `<button onclick="changePage(${
            currentPage + 1
          })" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">→</button>`;
        }
      }

      function changePage(page) {
        currentPage = page;
        renderCoursiers();
      }

      function filterCoursiers() {
        const query = document
          .getElementById("search-input")
          .value.toLowerCase();
        filteredCoursiers = coursiers.filter(
          (c) =>
            c.nom.toLowerCase().includes(query) ||
            c.telephone.toLowerCase().includes(query) ||
            c.zone.toLowerCase().includes(query)
        );
        currentPage = 1;
        renderCoursiers();
      }

      function showAddModal() {
        editIndex = null;
        document.getElementById("modal-title").textContent =
          "Ajouter un coursier";
        document.getElementById("form-courier").reset();
        showModal("modal-courier");
      }

      function editCourier(index) {
        editIndex = index;
        const c = coursiers[index];
        document.getElementById("nom").value = c.nom;
        document.getElementById("telephone").value = c.telephone;
        document.getElementById("zone").value = c.zone;
        document.getElementById("modal-title").textContent =
          "Modifier le coursier";
        showModal("modal-courier");
      }

      function showDeleteModal(index) {
        deleteIndex = index;
        showModal("modal-delete");
      }

      function confirmDeleteCourier() {
        if (deleteIndex !== null) {
          coursiers.splice(deleteIndex, 1);
          filterCoursiers();
          closeModal("modal-delete");
        }
      }

      function showModal(id) {
        document.getElementById(id).classList.remove("hidden");
      }

      function closeModal(id) {
        document.getElementById(id).classList.add("hidden");
      }

      document.getElementById("form-courier").onsubmit = function (e) {
        e.preventDefault();
        const nom = document.getElementById("nom").value;
        const telephone = document.getElementById("telephone").value;
        const zone = document.getElementById("zone").value;
        const newCourier = { nom, telephone, zone };

        if (editIndex === null) {
          coursiers.push(newCourier);
        } else {
          coursiers[editIndex] = newCourier;
          editIndex = null;
        }

        filterCoursiers();
        closeModal("modal-courier");
        this.reset();
      };

      filterCoursiers();
    </script>
  </body>
</html>
