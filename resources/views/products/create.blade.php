@extends('layouts.app-dashboard')
@section('title', 'Tableau de bord')
@section('content')

<script>
    function productTable() {
        return {
            products: [],
            categories: [],
            ingredients: [],
            skinTypes: [],
            currentPage: 1,
            totalPages: 1,
            search: '',
            selectedCategory: '',
            openProductForm: false,
            openDeleteModal: false,
            selectedProduct: null,
            previewImage: null,

            loading: false,
            submitting: false,
            deletingProductId: null,

            newProduct: {
                id: null,
                name: '',
                description: '',
                skin_type_ids: [],
                ingredient_ids: [],
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
                this.loading = true;
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
                    }) 
                    .finally(() => {
                        this.loading = false;
                    });
            },
            fetchCategories() {
                fetch('/admin/categories/json')
                    .then(res => res.json())
                    .then(data => {
                        this.categories = data;
                    });
            },
            //fetch ingredients
            fetchIngredients() {
                fetch('/admin/ingredients/json')
                    .then(res => res.json())
                    .then(data => {
                        this.ingredients = data;
                        console.log('Ingredients fetched:', this.ingredients); // ✅ LOG INGREDIENTS
                    });
            },
            fetchSkinTypes() {
                fetch('/admin/skintypes/json')
                    .then(res => res.json())
                    .then(data => {
                        this.skinTypes = data;
                        console.log('Skin Types fetched:', this.skinTypes); // ✅ LOG SKIN TYPES
                    });
            },
            submitForm() {
                this.submitting = true;
                const formData = new FormData();
                formData.append('name', this.newProduct.name);
                formData.append('description', this.newProduct.description = window.editor.getContent());
                // formData.append('skin_type', this.newProduct.skin_type);
                formData.append('bestseller', this.newProduct.bestseller ? 1 : 0);
                formData.append('popular', this.newProduct.popular ? 1 : 0);
                formData.append('featured', this.newProduct.featured ? 1 : 0);
                formData.append('category_id', this.newProduct.category_id);
                formData.append('price', this.newProduct.price);
                formData.append('stock', this.newProduct.stock);

                this.newProduct.ingredient_ids.forEach((ingredient, index) => {
                    formData.append(`ingredient_ids[${index}]`, ingredient);
                });

                this.newProduct.skin_type_ids.forEach((skinType, index) => {
                    formData.append(`skin_type_ids[${index}]`, skinType);
                });

                if (this.newProduct.image instanceof File) {
                    formData.append('image', this.newProduct.image);
                }

                //console.log('Submitting product:', this.newProduct); // ✅ LOG PRODUCT DETAILS
                //console.log('Form Data:', formData); // ✅ LOG FORM DATA

                // return;

                const isEdit = !!this.newProduct.id;
                const url = isEdit ? `/admin/products/${this.newProduct.id}` : '/admin/products';
                // const method = isEdit ? 'PUT' : 'POST';
                const method = 'POST';

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
                    console.log('Response status:', res.status); // ✅ LOG RESPONSE STATUS
                    if (res.status === 422) {
                        return res.json().then(data => {
                            this.errors = data.errors || {};
                            console.log('Validation errors:', this.errors); // ✅ LOG VALIDATION ERRORS
                            Toastify({
                                text: "Veuillez corriger les erreurs dans le formulaire",
                                duration: 4000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#e63946"
                            }).showToast();
                        });
                    } 
                    return res.json();
                })
                .then(data => {
                    if (!data || !data.product) return ;
                    console.log('Product response:', data); // ✅ LOG RESPONSE HERE
                    if (data.product && data.product.image_url) {
                        console.log('Product:', data.product); // ✅ CHECK IMAGE
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
                })    
                .finally(() => {
                    this.submitting = false;
                });
            },
            resetForm() {
                this.newProduct = {
                    name: '',
                    description: '',
                    skin_type_ids: [],
                    ingredient_ids: [],
                    bestseller: false,
                    popular: false,
                    featured: false,
                    category_id: '',
                    price: '',
                    stock: '',
                    image: null,
                };
                this.errors = {
                    name: '',
                    description: '',
                    skin_type_ids: [],
                    ingredient_ids: [],
                    bestseller: '',
                    popular: '',
                    featured: '',
                    category_id: '',
                    price: '',
                    stock: '',
                    image: '',
                };
                this.previewImage = null;

                //Réinitialise l'input de l'image
                const fileInput = document.querySelector('input[type="file"]');
                if (fileInput) {
                    fileInput.value = ''; // Réinitialise l'input de fichier
                }
            },

            deleteProduct(id) {
                this.deletingProductId = id; // Active l'effet fade-out
                setTimeout(() => {
                    fetch(`/admin/products/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(res => {
                        if (res.status === 200) {
                            this.openDeleteModal = false;
                            this.fetchProducts();
                            Toastify({
                                text: "Produit supprimé avec succès",
                                duration: 3000,
                                gravity: "top",
                                position: "right",
                                backgroundColor: "#7a6b5f"
                            }).showToast();
                        } else {
                            return res.text().then(txt => {
                                throw new Error(txt);
                            });
                        }
                    })
                    .catch(err => {
                        console.error(err.message);
                        Toastify({
                            text: "Erreur lors de la suppression du produit",
                            duration: 3000,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#e63946"
                        }).showToast();
                    })
                    .finally(() => {
                        this.deletingProductId = null; // Réinitialise l'effet fade-out
                    });
                }, 500);
            }, 
            openEditForm(product) {
                console.log('Editing product:', product); // ✅ LOG PRODUCT DETAILS
                this.newProduct = { 
                    id: product.id,
                    name: product.name,
                    description: product.description,
                    skin_type_ids: Array.isArray(product.skin_types) ? product.skin_types.map(skinType => skinType.id) : [], // Assurez-vous que c'est un tableau
                    ingredient_ids: Array.isArray(product.ingredients) ? product.ingredients.map(ing => ing.id) : [], // Assurez-vous que c'est un tableau d'IDs
                    bestseller: product.bestseller,
                    popular: product.popular,
                    featured: product.featured,
                    category_id: product.category_id,
                    price: product.price,
                    stock: product.stock,  
                    //ingredients: product.ingredients.map(ing => ing.id) || [], // Assurez-vous que c'est un tableau d'IDs 
                    image: null,
                    image_url: product.image_url ?? null, // convertir en URL exploitable
                 };

                 // Attendre que le modal soit affiché avant de mettre à jour l'aperçu de l'image
                this.previewImage = product.image_url ? product.image_url : null; // Mettre à jour l'aperçu de l'image

                // 👇 Attendre que le modal soit visible, puis injecter la description
                setTimeout(() => {
                    window.editor.setContent(product.description);
                }, 100);

                this.openProductForm = true;
            },
        }
    }
</script>

<main class="flex-1 overflow-y-auto p-6"
      x-data="productTable()"
      x-init="fetchProducts(); fetchCategories(); fetchIngredients(); fetchSkinTypes();"
      @open-product-form.window="openProductForm = true"
      @close-product-form.window="openProductForm = false"
      @open-delete-modal.window="openDeleteModal = true"
      @close-delete-modal.window="openDeleteModal = false"
      >
      
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

            <div x-show="loading" class="text-center py-4 text-[#7a6b5f] font-semibold">
                Chargement des produits...
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
                    <tr class="border-b hover:bg-gray-50 transition-all duration-300"
                        :class="deletingProductId === product.id ? 'fade-out' : ''"
                    >
                            <td class="px-6 py-4" x-text="`PRD-${product.id.toString().padStart(4, '0')}`"></td>
                            <td class="px-6 py-4" x-text="product.name"></td>
                            <!-- <td class="px-6 py-4" x-text="product.category?.name"></td> -->
                            <td class="px-6 py-4" x-text="product.category?.name ?? 'N/A'"></td>
                            <!-- <td class="px-6 py-4" x-text="`${product.price.toFixed(2)} €`"></td> -->
                            <td class="px-6 py-4" x-text="`${parseFloat(product.price).toFixed(2)} €`"></td>
                            <td class="px-6 py-4" x-text="product.stock"></td>
                            <td class="px-6 py-4">
                            <!-- <img :src="`/storage/products/${product.image}`" class="w-10 h-10 rounded-full" /> -->
                            <img :src="product.image_url" alt="Image produit" class="w-10 h-10 rounded-full" />
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
        <div class="bg-white px-6 py-4 rounded-lg w-full max-w-7xl shadow-lg">
            <h3 class="text-xl font-semibold mb-4" x-text="newProduct.id ? 'Modifier le produit' : 'Ajouter un produit'"></h3>
            <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="flex justify-between">
                            <div class="mb-2">
                                <label class="block mb-1 font-bold">Nom du produit</label>
                                <input type="text" placeholder="Nom du produit" x-model="newProduct.name" class="w-full border rounded px-3 py-2" />
                                <div class="mt-1">
                                    <span x-text="errors.name" class="text-red-600 text-sm"></span>
                                </div>
                            </div>
    
                            <div class="mb-2">
                                <label class="block mb-1 font-bold">Catégorie</label>
                                <select x-model="newProduct.category_id" class="w-full border rounded px-3 py-2">
                                    <option value="">-- Choisir une catégorie --</option>
                                    <template x-for="cat in categories" :key="cat.id">
                                        <option :value="cat.id" x-text="cat.name"></option>
                                    </template>
                                </select>
                                <div class="mt-1">
                                    <span x-text="errors.category_id" class="text-red-600 text-sm"></span>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <div class="mb-2">
                                <label class="block mb-1 font-bold">Prix (CFA)</label>
                                <input type="number" placeholder="Prix du produit" x-model="newProduct.price" step="0.01" class="w-full border rounded px-3 py-2" />
                                    <div class="mt-1">
                                        <span x-text="errors.price" class="text-red-600 text-sm"></span>
                                    </div>
                            </div>
                           
                            <div class="mb-2">
                                <label class="block mb-1 font-bold">Quantité</label>
                                <input type="number" placeholder="Quantité du produit" x-model="newProduct.stock" class="w-full border rounded px-3 py-2" />
                                <div class="mt-1">
                                    <span x-text="errors.stock" class="text-red-600 text-sm"></span>
                                </div>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="mb-2">
                            <label class="block mb-1 font-bold">Description</label>
                            <textarea rows="8" x-model="newProduct.description" class="w-full border p-2 rounded mt-2" placeholder="Description du produit"></textarea>
                            <div class="mt-1">
                                <span x-text="errors.description" class="text-red-600 text-sm"></span>
                            </div>
                        </div>
                    </div>
                    <div>
                        <!-- skin type -->
                        <div class="mb-2">
                            <label class="block mb-1 font-bold">Type de peau</label>
                            <!-- affichez les types de peau -->
                            <div class="border-2  p-2">
                                <template x-for="(skinType, index) in skinTypes" :key="skinType.id">
                                    <label class="inline-flex items-center mr-4">

                                        <input type="checkbox" 
                                        :value="skinType.id" 
                                        :checked="newProduct.skin_type_ids.includes(skinType.id)"
                                        @change="event => {
                                            if (event.target.checked) {
                                                newProduct.skin_type_ids.push(skinType.id);
                                            } else {
                                                newProduct.skin_type_ids = newProduct.skin_type_ids.filter(id => id !== skinType.id);
                                            }
                                        }" 
                                        class="mr-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        >
                                        <span x-text="skinType.name" class="ml-2"></span>
                                    </label>
                                </template>
                                <span x-text="errors.skinType" class="text-red-600 text-sm"></span>
                            </div>
                        </div>
                        <!--Ingredients -->
                        <div class="mb-2">
                            <label class="block mb-1 font-bold">Ingrédients</label>
                            <div class="border-2  p-2">
                                <template x-for="(ingredient, index) in ingredients.ingredients" :key="ingredient.id">
                                    <label class="inline-flex items-center mr-4">
                                        <input type="checkbox" 
                                            :value="ingredient.id" 
                                            :checked="newProduct.ingredient_ids.includes(ingredient.id)"
                                            @change="event => {
                                                if (event.target.checked) {
                                                    newProduct.ingredient_ids.push(ingredient.id);
                                                } else {
                                                    newProduct.ingredients = newProduct.ingredients.filter(id => id !== ingredient.id);
                                                }
                                            }" 
                                            
                                            class="mr-2 rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                        >
                                        <span x-text="ingredient.name" class="ml-2"></span>
                                    </label>
                                </template>
                                <span x-text="errors.ingredients" class="text-red-600 text-sm"></span>
                            </div>
                        </div>
          
                        <!-- Checkboxes -->
                        <div class="mt-2">
                            <!-- title -->
                            <label class="block mb-1 font-bold">Produits en vedette</label>
                            <div class="border-2 rounded p-4  space-y-1 ">
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
                        </div>
                        
                        <div class="mb-2">
                            <label class="block mb-1 font-bold">Photo</label>
                            <!-- Aperçu de l'image actuelle (en édition) -->
                            <!-- <div class="mb-2"> -->
                            <!-- <label class="block mb-1">Image</label> -->
                            <div class="flex items-center">
                                <input type="file" @change="e => newProduct.image = e.target.files[0]" class="ml-4" />

                                <template x-if="typeof newProduct.image_url === 'string'">
                                    <img :src="newProduct.image_url" class="w-20 h-20  rounded-md border-gray-50" />
                                </template>
                                <template x-if="typeof newProduct.image !== 'string' && newProduct.image">
                                    <img :src="URL.createObjectURL(newProduct.image)" class="w-20 h-20 rounded-md border-gray-50" />
                                </template>
                            </div>

                            <span x-text="errors.image" class="text-red-600 text-sm"></span>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" @click="openProductForm = false" class="text-gray-600 hover:underline">Annuler</button>
                    
                    <button type="submit" 
                        class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148] transition"
                        :disabled="submitting"
                    >
                        <span x-show="!submitting" x-text="newProduct.id ? 'Modifier' : 'Ajouter'"></span>
                        <span x-show="submitting">Veuillez patienter...</span>
                    </button>

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
                <button
                    @click="deleteProduct(selectedProduct.id)"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition"
                >
                    Supprimer
                </button>
    
            </div>
        </div>
    </div>
</main>

@endsection

