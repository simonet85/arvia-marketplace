@extends('layouts.app')
@section('content')
<div class="w-full mx-auto p-8 flex flex-col items-center">
  <div class="w-full grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- Cart Items -->
    <div class="bg-white rounded-lg shadow p-6 md:col-span-3" x-data="cartComponent()" x-init="fetchCartItems()">
      <h2 class="text-2xl font-semibold text-center mb-4">Votre Panier</h2>
      <template x-if="loading">
        <p class="text-center text-gray-500">Chargement du panier...</p>
      </template>
      <template x-if="!loading && cart.length === 0">
        <p class="text-center text-gray-500">Votre panier est vide.</p>
      </template>
      <template x-if="!loading && cart.length > 0">
        <p class="text-center text-gray-700 font-medium" x-text="'Vous avez ' + cart.length + ' dans votre panier'"></p>
      </template>
      <template x-if="!loading && cart.length > 0">
        <div class="space-y-4">
          <template x-for="item in cart" :key="item.id">
            <div class="flex justify-between items-center bg-gray-50 p-4 rounded-lg">
              <div class="flex items-center space-x-4">
                <img :src="item.product.image_url" alt="Product Image" class="w-20 h-20 object-cover rounded-lg">
                <div>
                  <h3 class="font-semibold text-lg" x-text="item.product.name"></h3>
                  <div class="flex space-x-4 mt-2">
                    <p class="text-sm text-gray-600" x-text="'Quantité : ' + item.quantity"></p>
                    <p class="text-sm text-gray-600" x-text="'Prix : ' + item.product.price + ' FCFA'"></p>
                  </div>
                </div>
              </div>
              <div class="flex space-x-2">
                <div class="flex flex-col sm:flex-row gap-2">
                  <button @click="updateQuantity(item.id, -1)" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded block w-full sm:w-auto">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button @click="updateQuantity(item.id, 1)" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded block w-full sm:w-auto">
                    <i class="fas fa-plus"></i>
                  </button>
                  <button @click="removeItem(item.id)" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded block w-full sm:w-auto">
                    <i class="fas fa-trash"></i>
                  </button>
                </div>
              </div>
            </div>
          </template>
          <div class="mt-4 text-center">
            <p class="font-bold text-xl text-gray-800" x-text="'Total : ' + total().toFixed(2) + ' FCFA'"></p>
            <button @click="clearCart()" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded mt-2">Vider le panier</button>
          </div>
        </div>
      </template>
    </div>
    
    <!-- Order Summary -->
    <div class="bg-white rounded-lg shadow p-6 md:col-span-1" x-data="cartComponent()" x-init="fetchCartItems()">
      <h2 class="text-2xl font-semibold text-center mb-4">Récapitulatif</h2>
      <div class="mb-6">
        <label class="block text-sm text-gray-700 mb-2 text-center">Appliquez un Code Promo</label>
        <div class="flex gap-2">
          <input x-model="promoCode" class="border rounded p-2 w-full" placeholder="Enter code">
          <button class="bg-gray-800 hover:bg-gray-900 text-white px-4 rounded">Appliquez</button>
        </div>
        <p class="text-xs mt-2 text-gray-500 text-center">Essayez le code: ARVEA20</p>
      </div>
      <div class="border-t pt-4 text-sm">
        <div class="flex justify-between mb-4">
          <span>Sous-total</span>
          <span><span x-text="total().toFixed(2)"></span> CFA</span>
        </div>
        <div class="flex justify-between mb-4">
          <span>Livraison</span>
          <span>Gratuite</span>
        </div>
        <div class="flex justify-between font-bold text-lg border-t pt-2">
          <span>Total</span>
          <span><span x-text="subtotal.toFixed(2)"></span> CFA</span>
        </div>
      </div>
      <!-- Checkout Button -->
      <a href="{{ route('checkout.index') }}" class="mt-6 block w-full bg-gray-800 hover:bg-gray-900 text-white text-center py-2 rounded">
        Procéder au paiement <span class="ml-2"><i class="fas fa-arrow-right"></i></span>
      </a>
      <a href="{{ route('products.index') }}" class="block w-full bg-gray-200 hover:bg-gray-300 text-center py-2 rounded mt-4">Continuer vos achats</a>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
function cartComponent() {
    return {
        cart: [],
        loading: true,
        subtotal: 0,
        promoCode: '',

        fetchCartItems() {
            fetch('/cart/items')
                .then(res => res.json())
                .then(data => {
                    this.cart = data;
                    console.log(this.cart);

                    this.updateSubtotal();

                    this.loading = false;
                });
        },

        updateQuantity(id, delta) {
            fetch(`/cart/update/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ quantity: delta })
            })
            .then(res => res.json())
            .then(updated => {
              // console.log(updated);
              // return;
                const item = this.cart.find(i => i.id === id);
                if (item) {
                    item.quantity = updated.quantity;
                }

                this.updateSubtotal();
                

            });
        },
        removeItem(id) {
            fetch(`/cart/remove/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            })
            .then(() => {
                this.cart = this.cart.filter(i => i.id !== id);
                this.updateSubtotal();
                Toastify({
                    text: "Produit retiré du panier",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#7a6b5f"
                }).showToast();
            });
        },

        clearCart() {
            fetch('/cart/clear', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(() => {
                this.cart = [];
                this.updateSubtotal();
                Toastify({
                    text: "Panier vidé ",
                    duration: 3000,
                    gravity: "top",
                    position: "right",
                    backgroundColor: "#7a6b5f"
                }).showToast();
            });
        },

        total() {
            return this.cart.reduce((sum, item) => sum + (item.product.price * item.quantity), 0);
        },

        updateSubtotal() {
            this.subtotal = this.cart.reduce((total, item) => total + item.product.price * item.quantity, 0);
        }
    };
}
</script>
@endpush


