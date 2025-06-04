@extends('layouts.app-dashboard')
@section('title', 'Order Details')
@section('content')
<main class="flex-1 overflow-y-auto p-6">
  <section class="bg-white rounded-lg shadow p-6 max-w-3xl mx-auto">
    <h2 class="text-2xl font-bold mb-4 text-[#493f35]">Order #{{ $order->order_number }}</h2>
    <div class="mb-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <div class="mb-2"><span class="font-semibold">Customer:</span> {{ $order->first_name }} {{ $order->last_name }}</div>
          <div class="mb-2"><span class="font-semibold">Email:</span> {{ $order->email }}</div>
          <div class="mb-2"><span class="font-semibold">Phone:</span> {{ $order->phone }}</div>
        </div>
        <div>
          <div class="mb-2"><span class="font-semibold">Shipping Address:</span> {{ $order->shipping_address }}, {{ $order->city }}, {{ $order->state }} {{ $order->zip }}</div>
          <div class="mb-2"><span class="font-semibold">Status:</span>
            <span class="px-2 py-1 rounded text-xs font-semibold
              @if($order->status === 'pending') bg-yellow-100 text-yellow-800
              @elseif($order->status === 'processing') bg-blue-100 text-blue-700
              @elseif($order->status === 'shipped') bg-purple-100 text-purple-700
              @elseif($order->status === 'delivered') bg-green-100 text-green-700
              @elseif($order->status === 'cancelled') bg-red-100 text-red-600
              @else bg-gray-100 text-gray-600 @endif">
              {{ ucfirst($order->status) }}
            </span>
          </div>
          <div class="mb-2"><span class="font-semibold">Payment:</span>
            <span class="px-2 py-1 rounded text-xs font-semibold
              @if($order->payment_status === 'paid') bg-green-100 text-green-700
              @elseif($order->payment_status === 'refunded') bg-blue-100 text-blue-700
              @else bg-gray-100 text-gray-600 @endif">
              {{ ucfirst($order->payment_status) }}
            </span>
          </div>
          <div class="mb-2"><span class="font-semibold">Date:</span> {{ $order->created_at->format('Y-m-d H:i') }}</div>
        </div>
      </div>
    </div>
    <h3 class="text-lg font-semibold mb-2">Order Items</h3>
    <div class="overflow-x-auto mb-6">
      <table class="min-w-full table-auto text-sm text-left text-gray-700">
        <thead class="bg-[#f9f8f4] text-xs uppercase">
          <tr>
            <th class="px-4 py-2 font-semibold">Product</th>
            <th class="px-4 py-2 font-semibold">Qty</th>
            <th class="px-4 py-2 font-semibold">Price</th>
            <th class="px-4 py-2 font-semibold">Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order->orderItems as $item)
            <tr>
              <td class="px-4 py-2">{{ $item->product->name ?? 'N/A' }}</td>
              <td class="px-4 py-2">{{ $item->quantity }}</td>
              <td class="px-4 py-2">{{ number_format($item->price, 2) }} FCFA</td>
              <td class="px-4 py-2">{{ number_format($item->price * $item->quantity, 2) }} FCFA</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="text-right text-lg font-bold">
      Total: {{ number_format($order->total_amount, 2) }} FCFA
    </div>
    <a href="{{ route('orders.index') }}" class="inline-block mt-6 text-[#493f35] hover:underline"><i class="fas fa-arrow-left"></i> Back to Orders</a>
  </section>
</main>
@endsection