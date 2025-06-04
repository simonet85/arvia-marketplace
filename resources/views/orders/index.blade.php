@extends('layouts.app-dashboard')
@section('title', 'Tableau de bord')
@section('content')
  <main class="flex-1 overflow-y-auto p-6">
    <!-- Search & Filters (optional, can be enhanced later) -->
    <section class="bg-white rounded-lg shadow p-4 mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <div class="flex items-center gap-2 flex-1">
        <i class="fas fa-search text-gray-400"></i>
        <input type="text" placeholder="Search orders..." class="w-full border-none focus:ring-0 text-sm bg-transparent" />
      </div>
      <div class="flex gap-2 flex-wrap">
        <select class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none">
          <option>All Status</option>
          <option>Pending</option>
          <option>Processing</option>
          <option>Shipped</option>
          <option>Delivered</option>
          <option>Cancelled</option>
        </select>
        <select class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none">
          <option>All Priority</option>
          <option>High</option>
          <option>Medium</option>
          <option>Low</option>
        </select>
        <button class="bg-[#f9f8f4] border border-gray-200 rounded-lg px-4 py-2 text-sm flex items-center gap-2 hover:bg-[#e7e5e0]">
          <i class="fas fa-file-export"></i> Export
        </button>
      </div>
    </section>

    <!-- Orders Table -->
    <section class="bg-white rounded-lg shadow p-6">
      <h2 class="text-xl font-bold mb-4 text-[#493f35]">Orders ({{ $orders->count() }})</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
          <thead class="bg-[#f9f8f4] text-xs uppercase">
            <tr>
              <th class="px-6 py-3 font-semibold">Order ID</th>
              <th class="px-6 py-3 font-semibold">Customer</th>
              <th class="px-6 py-3 font-semibold">Items</th>
              <th class="px-6 py-3 font-semibold">Total</th>
              <th class="px-6 py-3 font-semibold">Status</th>
              <th class="px-6 py-3 font-semibold">Payment</th>
              <th class="px-6 py-3 font-semibold">Date</th>
              <th class="px-6 py-3 font-semibold">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($orders as $order)
              <tr class="border-b hover:bg-[#f6f5f2]">
                <td class="px-6 py-4 font-mono font-semibold">
                  <a href="{{ route('orders.show', $order) }}" class="hover:underline">#{{ $order->order_number }}</a>
                </td>
                <td class="px-6 py-4">
                  <div class="font-semibold">{{ $order->first_name ?? $order->user->name }}</div>
                  <div class="text-xs text-gray-500">{{ $order->email ?? $order->user->email }}</div>
                </td>
                <td class="px-6 py-4 flex items-center gap-1">
                  <i class="fas fa-box"></i> {{ $order->orderItems->sum('quantity') }} items
                </td>
                <td class="px-6 py-4 font-semibold">{{ number_format($order->total_amount, 2) }} FCFA</td>
                <td class="px-6 py-4">
                  <span class="px-2 py-1 rounded text-xs font-semibold
                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                    @elseif($order->status === 'shipped') bg-purple-100 text-purple-700
                    @elseif($order->status === 'delivered') bg-green-100 text-green-700
                    @elseif($order->status === 'cancelled') bg-red-100 text-red-600
                    @else bg-gray-100 text-gray-600 @endif">
                    {{ ucfirst($order->status) }}
                  </span>
                </td>
                <td class="px-6 py-4">
                  <span class="px-2 py-1 rounded text-xs font-semibold
                    @if($order->payment_status === 'paid') bg-green-100 text-green-700
                    @elseif($order->payment_status === 'refunded') bg-blue-100 text-blue-700
                    @else bg-gray-100 text-gray-600 @endif">
                    {{ ucfirst($order->payment_status) }}
                  </span>
                </td>
                <td class="px-6 py-4 text-xs text-gray-500">
                  {{ $order->created_at->format('Y-m-d') }}<br>
                  <span class="text-gray-400">{{ $order->created_at->format('H:i') }}</span>
                </td>
                <td class="px-6 py-4 flex gap-2">
                  <a href="{{ route('orders.show', $order) }}" class="text-gray-500 hover:text-[#493f35]" title="View"><i class="fas fa-eye"></i></a>
                  {{-- Add more actions as needed --}}
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-center py-8 text-gray-400">No orders found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </section>
  </main>
@endsection