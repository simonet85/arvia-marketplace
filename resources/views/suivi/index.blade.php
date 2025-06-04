@extends('layouts.app-dashboard')
@section('title', 'Tableau de bord')
@section('content')
      <!-- suivi-commande.html -->
      <section class="p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">
          Détail de la Commande #1001
        </h2>

        <!-- Infos client & livraison -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
          <div class="grid md:grid-cols-2 gap-6">
            <div>
              <h3 class="font-semibold text-lg mb-2">Client</h3>
              <p>Marie Koné</p>
              <p>Email : marie.k@example.com</p>
              <p>Téléphone : +225 07 00 00 00</p>
            </div>
            <div>
              <h3 class="font-semibold text-lg mb-2">Adresse de Livraison</h3>
              <p>Rue des Palmiers, Abidjan</p>
              <p>Côte d'Ivoire</p>
            </div>
          </div>
        </div>

        <!-- Produits -->
        <div class="bg-white rounded-lg shadow p-6 mb-6">
          <h3 class="font-semibold text-lg mb-4">Produits</h3>
          <table class="w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-xs uppercase">
              <tr>
                <th class="px-4 py-2">Produit</th>
                <th class="px-4 py-2">Quantité</th>
                <th class="px-4 py-2">Prix</th>
                <th class="px-4 py-2">Total</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b">
                <td class="px-4 py-3">Sérum Hydratant</td>
                <td class="px-4 py-3">2</td>
                <td class="px-4 py-3">22,50 €</td>
                <td class="px-4 py-3">45,00 €</td>
              </tr>
            </tbody>
          </table>

          <div class="text-right mt-4 font-semibold">
            <p>Sous-total : 45,00 €</p>
            <p>Livraison : 5,00 €</p>
            <p class="text-xl text-[#7a6b5f]">Total : 50,00 €</p>
          </div>
        </div>

        <!-- Suivi livraison -->
        <div class="bg-white rounded-lg shadow p-6">
          <h3 class="font-semibold text-lg mb-4">Suivi de Livraison</h3>
          <div class="flex items-center gap-4 text-sm text-gray-600">
            <div class="flex items-center gap-2">
              <div class="w-4 h-4 rounded-full bg-green-500"></div>
              <span>Commande passée</span>
            </div>
            <div class="w-6 border-t border-gray-300"></div>
            <div class="flex items-center gap-2">
              <div class="w-4 h-4 rounded-full bg-green-500"></div>
              <span>Préparation</span>
            </div>
            <div class="w-6 border-t border-gray-300"></div>
            <div class="flex items-center gap-2">
              <div class="w-4 h-4 rounded-full bg-yellow-400"></div>
              <span>En cours de livraison</span>
            </div>
            <div class="w-6 border-t border-gray-300"></div>
            <div class="flex items-center gap-2">
              <div class="w-4 h-4 rounded-full bg-gray-300"></div>
              <span>Livrée</span>
            </div>
          </div>

          <!-- Actions -->
          <div class="mt-6 flex gap-4">
            <button
              class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
              onclick="markShipped()"
            >
              Marquer comme expédiée
            </button>
            <button
              class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700"
              onclick="markDelivered()"
            >
              Marquer comme livrée
            </button>
          </div>
        </div>
      </section>

      <script>
        function markShipped() {
          alert("Commande expédiée !");
          // Update statut via API
        }

        function markDelivered() {
          alert("Commande livrée !");
          // Update statut via API
        }
      </script>
@endsection