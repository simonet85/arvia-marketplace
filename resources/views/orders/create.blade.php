@extends('layouts.app-dashboard')
@section('title', 'Tableau de bord')
@section('content')
  <!-- commande.html -->
  <section class="p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">
      Gestion des Commandes
    </h2>

    <!-- Table commandes -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
      <table class="min-w-full table-auto text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-xs uppercase">
          <tr>
            <th class="px-6 py-3">#</th>
            <th class="px-6 py-3">Client</th>
            <th class="px-6 py-3">Date</th>
            <th class="px-6 py-3">Montant</th>
            <th class="px-6 py-3">Statut</th>
            <th class="px-6 py-3">Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Exemple -->
          <tr class="border-b hover:bg-gray-50">
            <td class="px-6 py-4">#1001</td>
            <td class="px-6 py-4">Marie Koné</td>
            <td class="px-6 py-4">10/04/2025</td>
            <td class="px-6 py-4">45,00 €</td>
            <td class="px-6 py-4">
              <span
                class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded text-xs"
              >
                En attente
              </span>
            </td>
            <td class="px-6 py-4 flex gap-3">
              <button
                class="text-blue-600 hover:underline"
                onclick="viewOrder()"
              >
                Voir
              </button>
              <button
                class="text-green-600 hover:underline"
                onclick="markAsShipped()"
              >
                Expédier
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- Modal Voir -->
    <div
      id="modal-view"
      class="fixed z-10 inset-0 overflow-y-auto hidden"
    >
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      >
        <div
          class="fixed inset-0 transition-opacity"
          aria-hidden="true"
        >
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
        >
          &#8203;
        </span>

        <div
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
        >
          <div class="text-center">
            <h3
              class="text-lg leading-6 font-medium text-gray-900"
              id="modal-heading"
            >
              Détails de la commande
            </h3>
          </div>
          <div class="mt-2">
            <p class="text-sm text-gray-500 id="modal-description">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Mauris euismod, massa quis mollis vulputate, nunc libero
              convallis nisl, ultrices elementum sapien magna sit amet
              sapien.
            </p>
          </div>
          <div class="mt-5 sm:mt-6">
            <button
              type="button"
              class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
              id="close-modal"
            >
              Fermer
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Expédier -->
    <div
      id="modal-ship"
      class="fixed z-10 inset-0 overflow-y-auto hidden"
    >
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      >
        <div
          class="fixed inset-0 transition-opacity"
          aria-hidden="true"
        >
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
        >
          &#8203;
        </span>

        <div
          class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"  
        >
          <div class="text-center">
            <h3
              class="text-lg leading-6 font-medium text-gray-900"
              id="modal-heading"
            >
              Expédier la commande
            </h3>
          </div>
          <div class="mt-2">
            <p class="text-sm text-gray-500 id="modal-description">
              Êtes-vous sûr de vouloir expédier cette commande ?
            </p>
          </div>
          <div class="mt-5 sm:mt-6">
            <button
              type="button"
              class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:text-sm"
              id="confirm-ship"
            >
              Oui, expédier
            </button>
            <button
              type="button"
              class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm"
              id="cancel-ship"
            >
              Annuler 
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
      
  <script>
    // JavaScript pour gérer les modals
    function viewOrder() {
      document.getElementById("modal-view").classList.remove("hidden");
    }
  
    function markAsShipped() {
      document.getElementById("modal-ship").classList.remove("hidden");
    }
  
    document.getElementById("close-modal").onclick = function () {
      document.getElementById("modal-view").classList.add("hidden");
    };
  
    document.getElementById("cancel-ship").onclick = function () {
      document.getElementById("modal-ship").classList.add("hidden");
    };
    document.getElementById("confirm-ship").onclick = function () {
      alert("Commande expédiée !");
      document.getElementById("modal-ship").classList.add("hidden");
    };
  </script>
@endsection