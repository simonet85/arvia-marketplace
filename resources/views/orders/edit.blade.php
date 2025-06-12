{{-- filepath: c:\laragon\www\arvia-marketplace\resources\views\orders\edit.blade.php --}}
@extends('layouts.app-dashboard')
@section('title', 'Modifier la commande')
@section('content')
<main class="flex-1 overflow-y-auto p-6">
    
    <section class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-[#493f35]">Modifier la commande #{{ $order->order_number }}</h2>

        @if ($errors->any())
            <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('orders.update', $order) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Statut</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    @foreach(\App\Models\Order::STATUS_LIST as $status)
                        <option value="{{ $status }}" @selected($order->status == $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Paiement</label>
                <select name="payment_status" class="w-full border rounded px-3 py-2">
                    @foreach(\App\Models\Order::PAYMENT_STATUS_LIST as $payment_status)
                        <option value="{{ $payment_status }}" @selected($order->payment_status == $payment_status)>{{ ucfirst($payment_status) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Priorité</label>
                <select name="priority" class="w-full border rounded px-3 py-2">
                    @foreach(\App\Models\Order::PRIORITY_LIST as $priority)
                        <option value="{{ $priority }}" @selected($order->priority == $priority)>{{ ucfirst($priority) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="bg-[#493f35] text-white px-6 py-2 rounded hover:bg-[#362c22] transition">
                    Enregistrer
                </button>
                <a href="{{ route('orders.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300 transition">
                    Annuler
                </a>
            </div>
        </form>

        <div class="mt-8">
            <h3 class="text-lg font-semibold mb-2">Articles de la commande</h3>
            <table class="min-w-full table-auto text-sm text-left text-gray-700">
                <thead class="bg-[#f9f8f4] text-xs uppercase">
                    <tr>
                        <th class="px-4 py-2 font-semibold">Produit</th>
                        <th class="px-4 py-2 font-semibold">Quantité</th>
                        <th class="px-4 py-2 font-semibold">Prix</th>
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
            <div class="text-right text-lg font-bold mt-4">
                Total : {{ number_format($order->total_amount, 2) }} FCFA
            </div>
        </div>
    </section>
</main>
@endsection