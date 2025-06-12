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
      <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
        <div class="bg-[#e7e5e0] rounded-full p-3">
          <i class="fas fa-box text-[#7a6b5f] text-2xl"></i>
        </div>
        <div>
          <h3 class="text-xs text-gray-500 font-semibold">Total Commandes</h3>
          <p class="text-2xl font-bold text-[#493f35]">{{ $totalOrders ?? 0 }}</p>
        </div>
      </div>
      <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
        <div class="bg-[#fff7e0] rounded-full p-3">
          <i class="fas fa-clock text-yellow-500 text-2xl"></i>
        </div>
        <div>
          <h3 class="text-xs text-gray-500 font-semibold">En attente</h3>
          <p class="text-2xl font-bold text-[#493f35]">{{ $pendingOrders ?? 0 }}</p>
        </div>
      </div>
      <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
        <div class="bg-[#e6aaa0] rounded-full p-3">
          <i class="fas fa-ban text-red-500 text-2xl"></i>
        </div>
        <div>
          <h3 class="text-xs text-gray-500 font-semibold">Annulée</h3>
          <p class="text-2xl font-bold text-[#493f35]">{{ $cancelledOrders ?? 0 }}</p>
        </div>
      </div>
      <div class="bg-white p-6 rounded-lg shadow flex items-center gap-4">
        <div class="bg-[#e6fbe8] rounded-full p-3">
          <i class="fas fa-check-circle text-green-500 text-2xl"></i>
        </div>
        <div>
          <h3 class="text-xs text-gray-500 font-semibold">Effectuées</h3>
          <p class="text-2xl font-bold text-[#493f35]">{{ $completedOrders ?? 0 }}</p>
        </div>
      </div>
    </section>

    <!-- Commandes récentes -->
    <section class="bg-white p-6 rounded shadow">
      <h3 class="text-xl font-semibold text-[#7a6b5f] mb-4">Commandes récentes</h3>
      <div class="overflow-x-auto">
        <table class="min-w-full text-sm">
          <thead>
            <tr class="border-b">
              <th class="py-2 text-left">N°</th>
              <th class="py-2 text-left">Client</th>
              <th class="py-2 text-left">Montant</th>
              <th class="py-2 text-left">Statut</th>
            </tr>
          </thead>
          <tbody>
            @forelse($recentOrders as $order)
              <tr class="border-b">
                <td class="py-2">#{{ $order->order_number }}</td>
                <td class="py-2">{{ $order->user->name ?? '-' }}</td>
                <td class="py-2">{{ number_format($order->total_amount, 2) }} FCFA</td>
                <td class="py-2">
                  @if($order->status === 'Effectuée')
                    <span class="text-green-600">{{ $order->status }}</span>
                  @elseif($order->status === 'En attente')
                    <span class="text-yellow-500">{{ $order->status }}</span>
                  @elseif($order->status === 'Annulée')
                    <span class="text-red-500">{{ $order->status }}</span>
                  @else
                    <span>{{ $order->status }}</span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="py-4 text-center text-gray-400">Aucune commande récente.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </section>
  </main>
@endsection