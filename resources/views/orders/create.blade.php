@extends('layouts.app-dashboard')
@section('title', 'Créer une commande')
@section('content')
<main class="flex-1 overflow-y-auto p-6">
    <section class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-[#493f35]">Créer une nouvelle commande</h2>

        @if ($errors->any())
            <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Adresse de livraison</label>
                <input type="text" name="shipping_address" class="w-full border rounded px-3 py-2" value="{{ old('shipping_address') }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Statut</label>
                <select name="status" class="w-full border rounded px-3 py-2">
                    @foreach(\App\Models\Order::STATUS_LIST as $status)
                        <option value="{{ $status }}" @selected(old('status') == $status)>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Priorité</label>
                <select name="priority" class="w-full border rounded px-3 py-2">
                    @foreach(\App\Models\Order::PRIORITY_LIST as $priority)
                        <option value="{{ $priority }}" @selected(old('priority') == $priority)>{{ $priority }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Montant total</label>
                <input type="number" step="0.01" name="total_amount" class="w-full border rounded px-3 py-2" value="{{ old('total_amount') }}" required>
            </div>
            <div class="flex gap-4 mt-6">
                <button type="submit" class="bg-[#493f35] text-white px-6 py-2 rounded hover:bg-[#362c22] transition">
                    Créer
                </button>
                <a href="{{ route('orders.index') }}" class="bg-gray-200 text-gray-700 px-6 py-2 rounded hover:bg-gray-300 transition">
                    Annuler
                </a>
            </div>
        </form>
    </section>
</main>
@endsection