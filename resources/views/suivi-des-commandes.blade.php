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
    </main>
  </body>
</html>
