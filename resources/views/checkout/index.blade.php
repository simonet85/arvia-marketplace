@extends('layouts.app')
@section('content')
<main class="max-w-6xl mx-auto py-10 px-4">
    {{--Afficher le message de success --}}

    @if(session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Succès!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <title>Fermer</title>
                    <path d="M14.348 5.652a1 1 0 00-1.414-1.414L10 8.586 7.066 5.652a1 1 0 00-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934z"/>
                </svg>
            </span>
        </div>
        <script>
            setTimeout(function() {
                var alert = document.getElementById('success-alert');
                if(alert) {
                    alert.style.display = 'none';
                }
            }, 30000);
        </script>
    @endif

    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Forms -->
            <div class="lg:col-span-2 flex flex-col gap-6">
                <!-- Contact Information -->
                <section class="bg-white rounded-lg shadow p-6 border">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-user"></i> Information de Contact
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Nom et Prénom(s)</label>
                            <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name', auth()->user()->name ?? '') }}" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email', auth()->user()->email ?? '') }}" required />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-medium mb-1">Téléphone(mobile)</label>
                            <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone', auth()->user()->phone ?? '') }}" required />
                        </div>
                    </div>
                </section>

                <!-- Shipping Address -->
                <section class="bg-white rounded-lg shadow p-6 border">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-location-dot"></i> Adresse de Livraison
                    </h2>
                    <div class="mb-4">
                        <label class="block text-sm font-medium mb-1">Adresse de Livraison</label>
                        <input type="text" placeholder=" Abidjan, Cocody 2 plateaux" name="shipping_address" class="w-full border rounded px-3 py-2" value="{{ old('shipping_address') }}" required />
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Notes de livraison (Optionnel)</label>
                        <textarea name="delivery_notes" class="w-full border rounded px-3 py-2" rows="2" placeholder="instructions de livraison...">{{ old('delivery_notes') }}</textarea>
                    </div>
                </section>

                <!-- Payment Method -->
                <section class="bg-white rounded-lg shadow p-6 border">
                    <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
                        <i class="fas fa-credit-card"></i> Méthodes de Paiements
                    </h2>
                    <div class="mb-4 flex flex-col gap-2">
                        <!-- cash on delivery option -->
                        <label class="flex items-center gap-2 cursor-pointer border rounded px-3 py-2">
                            <input type="radio" name="payment_method" value="cod" {{ old('payment_method') == 'cod' || old('payment_method') == null ? 'checked' : '' }} class="accent-[#493f35]" />
                            <span class="font-medium">Cash à la livraison</span>
                        </label>    
                        <!-- <label class="flex items-center gap-2 cursor-pointer border rounded px-3 py-2"> -->
                            <!-- <input type="radio" name="payment_method" value="card" {{-- old('payment_method') == 'card' ? 'checked' : '' --}} class="accent-[#493f35]" />
                            <span class="font-medium">Carte de Crédit / Débit</span>
                        </label> -->
                        <!-- <label class="flex items-center gap-2 cursor-pointer border rounded px-3 py-2">
                            <input type="radio" name="payment_method" value="paypal" {{-- old('payment_method') == 'paypal' ? 'checked' : '' --}} class="accent-[#493f35]" />
                            <span class="font-medium">PayPal</span>
                        </label> -->
                    </div>
                </section>
            </div>

            <!-- Right: Order Summary -->
            <div>
                <section class="bg-white rounded-lg shadow p-6 border">
                    <h2 class="text-lg font-semibold mb-4">Récapitulatif de la Commande</h2>
                    <div class="divide-y">
                        @php
                            $user = auth()->user();
                            $cartItems = $user ? $user->cartItems()->with('product')->get() : collect([]);
                            $subtotal = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);
                            $shipping = $subtotal > 75000 ? 0 : 10;
                            $tax = round($subtotal * 0.08, 2);
                            $total = $subtotal + $shipping + $tax;
                        @endphp
                        @foreach($cartItems as $item)
                        <div class="flex items-center gap-3 py-3">
                            <div class="w-12 h-12 bg-gray-100 rounded flex items-center justify-center">
                                <img src="{{ $item->product->image_url }}" alt="" class="w-10 h-10 object-cover rounded" />
                            </div>
                            <div class="flex-1">
                                <div class="font-medium">{{ $item->product->name }}</div>
                                <div class="text-xs text-gray-500">Qty: {{ $item->quantity }}</div>
                            </div>
                            <div class="font-semibold">{{ number_format($item->product->price * $item->quantity, 2) }} FCFA</div>
                        </div>
                        @endforeach
                    </div>
                    <div class="border-t mt-4 pt-4 space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span class="font-medium">{{ number_format($subtotal, 2) }} FCFA</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Shipping</span>
                            <span class="font-medium">{{ $shipping == 0 ? 'Free' : number_format($shipping, 2) . ' FCFA' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax</span>
                            <span class="font-medium">{{ number_format($tax, 2) }} FCFA</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold pt-2">
                            <span>Total</span>
                            <span>{{ number_format($total, 2) }} FCFA</span>
                        </div>
                    </div>
                    <ul class="mt-4 space-y-2 text-sm text-[#493f35]">
                        <li class="flex items-center gap-2"><i class="fas fa-lock text-green-500"></i> Encryption sécurisé SSL</li>
                        <li class="flex items-center gap-2"><i class="fas fa-truck text-green-500"></i> Expédition gratuite pour à 75 000 FCFA</li>
                        <li class="flex items-center gap-2"><i class="fas fa-undo text-green-500"></i> Remboursement guarantie avant 30 jours</li>
                    </ul>
                    <button type="submit" class="w-full bg-[#493f35] text-white font-semibold py-3 rounded-lg mt-6 hover:bg-[#362c22] transition">
                        Commander - {{ number_format($total, 2) }} FCFA
                    </button>
                    <a href="{{ route('cart.index') }}" class="w-full border border-[#493f35] text-[#493f35] font-semibold py-3 rounded-lg mt-3 hover:bg-[#f9f8f4] transition flex items-center justify-center gap-2">
                        <i class="fas fa-arrow-left"></i> Retour au Panier
                    </a>
                    <p class="text-xs text-gray-400 text-center mt-4">
                        Par l'achat de ce produit, vous acceptez <a href="#" class="underline">les conditions d'utilisation</a> et <a href="#" class="underline">la Politique de Confidentialité</a>.
                    </p>
                </section>
            </div>
        </div>
    </form>
</main>
@endsection