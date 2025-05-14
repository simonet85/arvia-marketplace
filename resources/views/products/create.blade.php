@extends('layouts.app-dashboard')
@section('title', 'Tableau de bord')
@section('content')

<script>
    function productTable() {
        return {
            products: [],
            categories: [],
            currentPage: 1,
            totalPages: 1,
            search: '',
            selectedCategory: '',
            openProductForm: false,
            openDeleteModal: false,
            selectedProduct: null,

            newProduct: {
                id: null,
                name: '',
                description: '',
                skin_type: '',
                bestseller: false,
                popular: false,
                featured: false,
                category_id: '',
                price: '',
                stock: '',
                image: null,
            },

            errors: {},

            pages(){
                return Array.from({ length: this.totalPages }, (_, i) => i + 1);
            },
            fetchProducts(page = 1) {
                const param = new URLSearchParams({
                    page,
                    search: this.search,
                    category: this.selectedCategory
                });

                fetch(`/admin/products/json?${param.toString()}`)
                    .then(res => res.json())
                    .then(data => {
                        console.log(data.data);
                        this.products = data.data;
                        this.currentPage = data.current_page;
                        this.totalPages = data.last_page;
                    });
            },
            fetchCategories() {
                fetch('/admin/categories/json')
                    .then(res => res.json())
                    .then(data => {
                        this.categories = data;
                    });
            },
            submitForm() {
                const formData = new FormData();
                formData.append('name', this.newProduct.name);
                formData.append('description', this.newProduct.description);
                formData.append('skin_type', this.newProduct.skin_type);
                formData.append('bestseller', this.newProduct.bestseller ? 1 : 0);
                formData.append('popular', this.newProduct.popular ? 1 : 0);
                formData.append('featured', this.newProduct.featured ? 1 : 0);
                formData.append('category_id', this.newProduct.category_id);
                formData.append('price', this.newProduct.price);
                formData.append('stock', this.newProduct.stock);

                if (this.newProduct.image instanceof File) {
                    formData.append('image', this.newProduct.image);
                }

                const isEdit = !!this.newProduct.id;
                const url = isEdit ? `/admin/products/${this.newProduct.id}` : '/admin/products';
                const method = isEdit ? 'PUT' : 'POST';

                if (isEdit) {
                    formData.append('_method', 'PUT');
                }

                fetch(url, {
                    method,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(res => {
                    if (res.status === 422) return res.json().then(data => { this.errors = data.errors });
                    return res.json();
                })
                .then(data => {
                    console.log('Product response:', data); // ✅ LOG RESPONSE HERE
                    if (data.product && data.product.image_url) {
                        console.log('Image URL:', data.product.image_url); // ✅ CHECK IMAGE
                    }
                    this.openProductForm = false;
                    this.fetchProducts(); // Recharge la liste
                    Toastify({
                        text: isEdit ? "Produit modifié avec succès" : "Produit ajouté avec succès",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#7a6b5f"
                    }).showToast();
                })
                .catch(err => {
                    console.error(err.message);
                    // Toastify({
                    //     text: "Erreur lors de l'ajout du produit",
                    //     duration: 3000,
                    //     gravity: "top",
                    //     position: "right",
                    //     backgroundColor: "#e63946"
                    // }).showToast();
                });
            },
            resetForm() {
                this.newProduct = {
                    name: '',
                    description: '',
                    skin_type: '',
                    bestseller: false,
                    popular: false,
                    featured: false,
                    category_id: '',
                    price: '',
                    stock: '',
                    image: null,
                };
                this.errors = {};
            },

            deleteProduct(id) {
                fetch(`/admin/products/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(res => {
                    if (res.status === 200) {
                        this.openDeleteModal = false;
                        this.fetchProducts(); // Recharge la liste
                        Toastify({
                            text: "Produit supprimé avec succès",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#7a6b5f"
                        }).showToast();
                    }
                })
                .catch(err => {
                    console.error(err);
                    Toastify({
                        text: "Erreur lors de la suppression du produit",
                        duration: 3000,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#e63946"
                    }).showToast();
                });
            },
            openEditForm(product) {
                this.newProduct = { ...product, 
                    image: `/storage/${product.image}`, // convertir en URL exploitable
                 };
                this.openProductForm = true;
            },
        }
    }
</script>

<main class="flex-1 overflow-y-auto p-6"
      x-data="productTable()"
      x-init="fetchProducts(); fetchCategories()"
      @open-product-form.window="openProductForm = true"
      @close-product-form.window="openProductForm = false"
      @open-delete-modal.window="openDeleteModal = true"
      @close-delete-modal.window="openDeleteModal = false">
      
    <header class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-[#7a6b5f]">Tableau de Bord</h2>
        <button class="md:hidden p-2 text-[#7a6b5f]">
            <i class="fas fa-bars"></i>
        </button>
    </header>

    <!-- Stats -->
    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-sm text-gray-500">Commandes du jour</h3>
            <p class="text-2xl font-bold text-[#7a6b5f]">14</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-sm text-gray-500">Commandes totales</h3>
            <p class="text-2xl font-bold text-[#7a6b5f]">823</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-sm text-gray-500">Ventes totales</h3>
            <p class="text-2xl font-bold text-[#7a6b5f]">34 200€</p>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-sm text-gray-500">Utilisateurs actifs</h3>
            <p class="text-2xl font-bold text-[#7a6b5f]">128</p>
        </div>
    </section>

    <!-- Products Table -->
    <section class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Gestion des Produits</h2>
            <button @click="resetForm(); openProductForm = true" class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148] transition">
                + Ajouter un produit
            </button>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <div class="flex flex-wrap gap-4 px-4 items-center py-5">
                <input
                    type="text"
                    placeholder="Rechercher un produit..."
                    x-model="search"
                    @input.debounce.300ms="fetchProducts()"
                    class="border px-3 py-2 rounded w-60"
                />

                <select
                    x-model="selectedCategory"
                    @change="fetchProducts()"
                    class="border px-3 py-2 rounded">
                    <option value="">Toutes les catégories</option>
                    <template x-for="cat in categories" :key="cat.id">
                        <option :value="cat.id" x-text="cat.name"></option>
                    </template>
                </select>
            </div>

            <table class="min-w-full table-auto text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Nom</th>
                        <th class="px-6 py-3">Catégorie</th>
                        <th class="px-6 py-3">Prix</th>
                        <th class="px-6 py-3">Stock</th>
                        <th class="px-6 py-3">Photo</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody >
                    <template x-for="product in products" :key="product.id">
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4" x-text="`PRD-${product.id.toString().padStart(4, '0')}`"></td>
                            <td class="px-6 py-4" x-text="product.name"></td>
                            <!-- <td class="px-6 py-4" x-text="product.category?.name"></td> -->
                            <td class="px-6 py-4" x-text="product.category?.name ?? 'N/A'"></td>
                            <!-- <td class="px-6 py-4" x-text="`${product.price.toFixed(2)} €`"></td> -->
                            <td class="px-6 py-4" x-text="`${parseFloat(product.price).toFixed(2)} €`"></td>
                            <td class="px-6 py-4" x-text="product.stock"></td>
                            <td class="px-6 py-4">
                            <!-- <img :src="`/storage/products/${product.image}`" class="w-10 h-10 rounded-full" /> -->
                            <img :src="`/storage/${product.image}`" alt="Image produit" class="w-10 h-10 rounded-full" />

                            <!-- <template x-if="newProduct.image_url">
                                <img 
                                    :src="newProduct.image_url" 
                                   class="w-10 h-10 rounded-full"
                                />
                            </template>
                            <template x-if="!newProduct.image_url">
                                <img 
                                    :src="`/storage/products/${product.image}`" 
                                   class="w-10 h-10 rounded-full"
                                />
                            </template> -->

                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <button @click="openEditForm(product)" class="text-blue-600 hover:underline">Modifier</button>
                                <button @click="selectedProduct = product; openDeleteModal = true" class="text-red-600 hover:underline">Supprimer</button>
                            </td>
                        </tr>
                    </template>
                </tbody>

                </table>
                <div class="flex justify-center space-x-2 items-center py-4">
                    <button
                        @click="fetchProducts(currentPage - 1)"
                        :disabled="currentPage === 1"
                        class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"
                    >
                        <i class="fas fa-chevron-left"></i>
                    </button>

                    <template x-for="page in pages()" :key="page">
                        <button
                            @click="fetchProducts(page)"
                            x-text="page"
                            :class="{
                                'bg-[#493f35] text-white': page === currentPage,
                                'bg-[#e7e5e0] hover:bg-[#d6d4d0]': page !== currentPage
                            }"
                            class="px-3 py-1 rounded-lg transition">
                        </button>
                    </template>


                    <button
                        @click="fetchProducts(currentPage + 1)"
                        :disabled="currentPage === totalPages"
                        class="px-3 py-1 rounded-lg bg-[#e7e5e0] hover:bg-[#d6d4d0]"
                    >
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
        </div>
    </section>

    <!-- Add/Edit Product Modal -->
    <!-- Formulaire -->
    <div x-show="openProductForm" 
        class="fixed inset-0 bg-black bg-opacity-30 flex justify-center items-center z-50"
        x-transition.opacity
        style="display: none;"
    >
        <div class="bg-white px-6 py-4 rounded-lg w-full max-w-2xl shadow-lg">
            <h3 class="text-xl font-semibold mb-4" x-text="newProduct.id ? 'Modifier le produit' : 'Ajouter un produit'"></h3>
            <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="mb-2">
                            <label class="block mb-1">Nom du produit</label>
                            <input type="text" x-model="newProduct.name" class="w-full border rounded px-3 py-2" />
                        </div>
                        <!-- Description -->
                        <div class="mb-2">
                            <label class="block mb-1">Description</label>
                            <textarea rows="8" x-model="newProduct.description" class="w-full border p-2 rounded mt-2" placeholder="Description du produit"></textarea>
                            <span x-text="errors.description" class="text-red-600 text-sm"></span>
                        </div>

                        <div class="mb-2">
                            <label class="block mb-1">Catégorie</label>
                            <select x-model="newProduct.category_id" class="w-full border rounded px-3 py-2">
                                <option value="">-- Choisir une catégorie --</option>
                                <template x-for="cat in categories" :key="cat.id">
                                    <option :value="cat.id" x-text="cat.name"></option>
                                </template>
                            </select>
                            <span x-text="errors.category_id" class="text-red-600 text-sm"></span>
                        </div>
                    </div>
                    <div>
                        <!-- skin type -->
                        <div class="mb-2">
                            <label class="block mb-1">Type de peau</label>
                            <select x-model="newProduct.skin_type" class="w-full border rounded px-3 py-2">
                                <option value="">-- Choisir un type de peau --</option>
                                <option value="sensitive">Peau sensible</option>
                                <option value="dry">Peau sèche</option>
                                <option value="oily">Peau grasse</option>
                                <option value="combination">Peau mixte</option>
                            </select>
                            <span x-text="errors.skin_type" class="text-red-600 text-sm"></span>
                        </div>

                        <div class="mb-2">
                            <label class="block mb-1">Prix (€)</label>
                            <input type="number" x-model="newProduct.price" step="0.01" class="w-full border rounded px-3 py-2" />
                        </div>
                        <span x-text="errors.price" class="text-red-600 text-sm"></span>
                        <div class="mb-2">
                            <label class="block mb-1">Stock</label>
                            <input type="number" x-model="newProduct.stock" class="w-full border rounded px-3 py-2" />
                        </div>
                        <span x-text="errors.stock" class="text-red-600 text-sm"></span>
                        <!-- Checkboxes -->
                        <div class="flex flex-col space-y-1 mt-4">
                            <label class="inline-flex items-center">
                                <input type="checkbox" x-model="newProduct.bestseller" class="mr-2"> Meilleure vente
                            </label>
                            <span x-text="errors.bestseller" class="text-red-600 text-sm"></span>

                            <label class="inline-flex items-center">
                                <input type="checkbox" x-model="newProduct.popular" class="mr-2"> Populaire
                            </label>
                            <span x-text="errors.popular" class="text-red-600 text-sm"></span>

                            <label class="inline-flex items-center">
                                <input type="checkbox" x-model="newProduct.featured" class="mr-2"> À la une
                            </label>
                            <span x-text="errors.featured" class="text-red-600 text-sm"></span>
                        </div>
                        
                        <div class="mb-2">
                            <label class="block mb-1">Photo</label>
                            <!-- Aperçu de l'image actuelle (en édition) -->
                            <template x-if="newProduct.image && typeof newProduct.image === 'string'">
                                    <img :src="newProduct.image" alt="Image actuelle" class="w-32 h-32 object-cover rounded border mb-2" />
                                </template>

                            <!-- Input de fichier (nouvelle image) -->
                            <input type="file" @change="e => {
                                const file = e.target.files[0];
                                if (file) {
                                    newProduct.image = file;
                                }
                            }" class="w-full border rounded px-3 py-2" />
                                    <span x-text="errors.image" class="text-red-600 text-sm"></span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" @click="openProductForm = false" class="text-gray-600 hover:underline">Annuler</button>
                    <button type="submit" class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148] transition" x-text="newProduct.id ? 'Modifier' : 'Ajouter'"></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
  <div x-show="openDeleteModal"
        class="fixed inset-0 bg-black bg-opacity-30 flex justify-center items-center z-50"
        x-transition.opacity
        style="display: none;"
    >
        <div class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg">
            <h3 class="text-xl font-semibold mb-4">Suppression du produit</h3>
            <p class="mb-4">Êtes-vous sûr de vouloir supprimer ce produit ?</p>
            <div class="flex justify-end gap-3">
                <button @click="openDeleteModal = false" class="text-gray-600 hover:underline">Annuler</button>
                <button @click="openDeleteModal = true; selectedProduct = product"  class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Supprimer
                </button>
               
            </div>
        </div>
    </div>
</main>

@endsection

