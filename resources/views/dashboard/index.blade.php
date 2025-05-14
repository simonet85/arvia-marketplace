@extends('layouts.app-dashboard')
@section('content')
  <!-- Main Content -->
  <main class="flex-1 overflow-y-auto p-6">
    <header class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold text-[#7a6b5f]">Tableau de Bord</h2>
      <button class="md:hidden p-2 text-[#7a6b5f]">
        <i class="fas fa-bars"></i>
      </button>
    </header>

    <!-- Stats Grid -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <div class="bg-white p-4 rounded shadow">
        <h3 class="text-sm text-gray-500">Commandes du jour</h3>
        <p class="text-2xl font-bold text-[#7a6b5f]">{{ $todayOrders ?? 14 }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h3 class="text-sm text-gray-500">Commandes totales</h3>
        <p class="text-2xl font-bold text-[#7a6b5f]">{{ $totalOrders ?? 823 }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h3 class="text-sm text-gray-500">Ventes totales</h3>
        <p class="text-2xl font-bold text-[#7a6b5f]">{{ $totalSales ?? '34 200€' }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h3 class="text-sm text-gray-500">Utilisateurs actifs</h3>
        <p class="text-2xl font-bold text-[#7a6b5f]">{{ $activeUsers ?? 128 }}</p>
      </div>
    </section>

    <!-- Commandes récentes -->
    <section class="bg-white p-6 rounded shadow">
      <h3 class="text-xl font-semibold text-[#7a6b5f] mb-4">Commandes récentes</h3>
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
@endsection
