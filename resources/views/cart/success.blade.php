@extends('layouts.app')
@section('content')
<div class="max-w-3xl mx-auto py-12 text-center">
    <h1 class="text-3xl font-bold mb-4">Merci pour votre commande !</h1>
    <p class="text-lg text-gray-700 mb-6">Votre commande a été passée avec succès.</p>
    <p class="text-gray-600 mb-8">
        Montant total : <span class="font-semibold">CFA{{-- number_format($order->total, 2) --}} CFA</span>
    </p>
    <a href="{{ route('products.index') }}" class="inline-block bg-gray-800 text-white px-6 py-3 rounded hover:bg-gray-700 transition">
        Retour à la boutique
    </a>
</div>
@endsection