@extends('layouts.app-dashboard')
@section('title', 'Tableau de bord')
@section('content')
  <main class="flex-1 overflow-y-auto p-6">
    <!-- Search & Filters (optional, can be enhanced later) -->
    <section class="bg-white rounded-lg shadow p-4 mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

      <form method="GET" action="{{ route('orders.index') }}" class="flex items-center gap-2 flex-1">
        <i class="fas fa-search text-gray-400"></i>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search orders..." class="w-full border-none focus:ring-0 text-sm bg-transparent" />
      </form>

      <div class="flex gap-2 flex-wrap">
        <form method="GET" action="{{ route('orders.index') }}" class="flex gap-2 flex-wrap">
          <select name="status" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none">
            <option value="">Tous les Status</option>
            @foreach(\App\Models\Order::STATUS_LIST as $status)
            <option value="{{ $status }}" @selected(request('status') == $status)>{{ $status }}</option>
            @endforeach
          </select>

          <select name="priority" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none">
            <option value="">Toutes les Priorités</option>
            @foreach(\App\Models\Order::PRIORITY_LIST as $priority)
            <option value="{{ $priority }}" @selected(request('priority') == $priority)>{{ $priority }}</option>
            @endforeach
          </select>

          <button type="submit" class="bg-[#f9f8f4] border border-gray-200 rounded-lg px-4 py-2 text-sm flex items-center gap-2 hover:bg-[#e7e5e0]">
            <i class="fas fa-filter"></i> Filter
          </button>

        </form>
        <button class="bg-[#f9f8f4] border border-gray-200 rounded-lg px-4 py-2 text-sm flex items-center gap-2 hover:bg-[#e7e5e0]">
          <i class="fas fa-file-export"></i> Export
        </button>
      </div>
    </section>

    <!-- Orders Table -->
    <section class="bg-white rounded-lg shadow p-6">
      @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
      @endif
      @if(session('error'))
        <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
      @endif

      <h2 class="text-xl font-bold mb-4 text-[#493f35]">Orders ({{ $orders->total() }})</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
          <thead class="bg-[#f9f8f4] text-xs uppercase">
            <tr>
              <th class="px-3 py-3 font-semibold">N°</th>
              <th class="px-3 py-3 font-semibold">Nom</th>
              <th class="px-3 py-3 font-semibold">Article</th>
              <th class="px-3 py-3 font-semibold">Total</th>
              <th class="px-3 py-3 font-semibold">Status</th>
              <th class="px-3 py-3 font-semibold">Priorité</th>
              <th class="px-3 py-3 font-semibold">Paiement</th>
              <th class="px-3 py-3 font-semibold">Date</th>
              <th class="px-3 py-3 font-semibold">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($orders as $order)
              <tr class="border-b hover:bg-[#f6f5f2]">
                <td class="px-3 py-4 font-mono font-semibold">
                  <a href="{{ route('orders.show', $order) }}" class="hover:underline">#{{ $order->order_number }}</a>
                </td>
                <td class="px-3 py-4">
                  <div class="font-semibold">{{ $order->first_name ?? $order->user->name }}</div>
                  <div class="text-xs text-gray-500">{{ $order->email ?? $order->user->email }}</div>
                </td>
                <td class="px-3 py-4 flex items-center gap-1">
                  <i class="fas fa-box"></i> {{ $order->orderItems->sum('quantity') }} items
                </td>
                <td class="px-3 py-4 font-semibold">{{ number_format($order->total_amount, 2) }} FCFA</td>
                <td class="px-3 py-4">
                  <span class="px-2 py-1 rounded text-xs font-semibold
                    @if($order->status === \App\Models\Order::STATUS_PENDING) bg-yellow-100 text-yellow-800
                    @elseif($order->status === \App\Models\Order::STATUS_COMPLETED) bg-green-100 text-green-700
                    @elseif($order->status === \App\Models\Order::STATUS_CANCELLED) bg-red-100 text-red-600
                    @else bg-gray-100 text-gray-600 @endif">
                    {{ ucfirst($order->status) }}
                  </span>
                </td>
                <td class="px-3 py-4">
                  <span class="px-2 py-1 rounded text-xs font-semibold
                    @if($order->priority === \App\Models\Order::PRIORITY_HIGH) bg-red-100 text-red-600
                    @elseif($order->priority === \App\Models\Order::PRIORITY_MEDIUM) bg-yellow-100 text-yellow-800
                    @elseif($order->priority === \App\Models\Order::PRIORITY_LOW) bg-gray-100 text-gray-600
                    @endif">
                    {{ ucfirst($order->priority) }}
                  </span>
                </td>
                <td class="px-3 py-4">
                  <span class="px-2 py-1 rounded text-xs font-semibold
                    @if($order->payment_status === \App\Models\Order::PAYMENT_STATUS_PAID) bg-green-100 text-green-700
                    @elseif($order->payment_status === \App\Models\Order::PAYMENT_STATUS_REFUNDED) bg-blue-100 text-blue-700
                    @else bg-gray-100 text-gray-600 @endif">
                    {{ ucfirst($order->payment_status) }}
                  </span>
                </td>
                <td class="px-3 py-4 text-xs text-gray-500">
                  {{ $order->created_at->format('Y-m-d') }}<br>
                  <span class="text-gray-400">{{ $order->created_at->format('H:i') }}</span>
                </td>
                <td class="px-3 py-4 flex gap-2">

                  <a href="{{ route('orders.show', $order) }}" class="text-gray-500 hover:text-[#493f35]" title="View"><i class="fas fa-eye"></i>
                  </a>

                  <a href="{{ route('orders.edit', $order) }}" class="text-gray-500 hover:text-[#493f35]" title="Edit">
                    <i class="fas fa-pencil-alt"></i>
                  </a>
                  @if($order->status === \App\Models\Order::STATUS_PENDING || $order->status === \App\Models\Order::STATUS_COMPLETED || $order->status === \App\Models\Order::STATUS_CANCELLED)
                    <!-- Cancel Button -->
                    <button type="button" class="text-red-500 hover:text-red-700" title="Annuler" onclick="document.getElementById('cancelOrderModal-{{ $order->id }}').classList.remove('hidden')">
                      <i class="fas fa-trash"></i>
                    </button>
                    <!-- Cancel Modal -->
                    <div id="cancelOrderModal-{{ $order->id }}" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
                      <div class="bg-white rounded-lg p-6 max-w-sm w-full">
                        <h3 class="text-lg font-bold mb-4">Confirmer l'annulation</h3>
                        <p class="mb-6">Êtes-vous sûr de vouloir annuler cette commande ?</p>
                        <div class="flex justify-end gap-2">
                          <button type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300" onclick="document.getElementById('cancelOrderModal-{{ $order->id }}').classList.add('hidden')">
                            Non
                          </button>
                          <form action="{{ route('orders.cancel', $order) }}" method="POST">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                              Oui
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  @endif

                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center py-8 text-gray-400">Aucune commande trouvée.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="mt-6">
        {{ $orders->links() }}
      </div>
    </section>
  </main>
@endsection