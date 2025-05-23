@extends('layouts.app-dashboard')
@section('title', 'Tableau de bord')
@section('content')
  <!-- resources/views/admin/categories.blade.php -->
<!-- <main class="flex-1 overflow-y-auto p-6"> -->
  <section class="p-6" x-data="categoryTable()" x-init="fetchCategories()">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold text-gray-800">Gestion des Catégories</h2>
      <button @click="openForm()" class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148] transition">
        + Ajouter une catégorie
      </button>
    </div>
    <!-- Search and Pagination -->
    <div class="flex items-center mb-4 p-2">
      <input type="text" x-model.debounce.500ms="search" @input="fetchCategories()" placeholder="Rechercher une catégorie..." class="border px-2 py-1 rounded" />
      <select x-model="perPage" @change="fetchCategories()" class="border px-2 py-1 rounded">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
      </select>
    </div>
    <!-- Categories Table -->
    <table class="min-w-full table-auto text-sm text-left text-gray-700 border-separate" style="border-spacing: 0 10px;">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2 rounded-tl-lg">ID</th>
          <th class="px-4 py-2">Nom</th>
          <th class="px-4 py-2">Image</th>
          <th class="px-4 py-2">Description</th>
          <th class="px-4 py-2 rounded-tr-lg">Actions</th>
        </tr>
      </thead>
      <tbody>
        <template x-for="category in categories" :key="category.id">
          <tr class="bg-white shadow-md rounded-lg">
            <td class="px-6 py-4 w-6 font-semibold text-gray-800" x-text="`CAT-${category.id.toString().padStart(4, '0')}`"></td>
            <td class="px-6 py-4 border-b border-gray-200" x-text="category.name"></td>
            <td class="px-6 py-4 border-b border-gray-200">
              <template x-if="category.image">
                <img :src="category.image_url" :alt="category.name" class="h-20 w-20 object-cover rounded-full">
              </template>
              <template x-if="!category.image">
                <span class="text-gray-500">Aucune image</span>
              </template>
            </td>
            <td class="px-6 py-4 border-b border-gray-200" x-text="category.description"></td>
            <td class="px-6 py-4 border-b border-gray-200">
              <button @click="openForm(category)" class="text-blue-500 hover:underline">Modifier</button>
              <button @click="deleteCategory(category.id), openDeleteModal(category.id)" class="text-red-500 hover:underline">Supprimer</button>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
    <!-- Pagination -->
    <div class="mt-4 flex justify-between items-center">
        <div>
            <span class="text-sm text-gray-700">
            Page <span x-text="pagination.current_page"></span>
            de <span x-text="pagination.last_page"></span>
            </span>
        </div>
        <div class="space-x-2">
            <button
            class="bg-[#7a6b5f] text-white px-4 py-2 rounded disabled:opacity-50"
            :disabled="!pagination.prev_page_url"
            @click="fetchCategories(pagination.prev_page_url)"
            >
            Précédent
            </button>
            <button
            class="bg-[#7a6b5f] text-white px-4 py-2 rounded disabled:opacity-50"
            :disabled="!pagination.next_page_url"
            @click="fetchCategories(pagination.next_page_url)"
            >
            Suivant
            </button>
        </div>
    </div>

    <!-- Modal Form -->
     <!-- Modal formulaire -->
    @include('partials.category-form-modal')
    <!-- Modal de suppression -->
    @include('partials.delete-category-modal')
  </section>
<!-- </main> -->

<script>
  function categoryTable() {
    return {
      categories: [],
      pagination: {
      current_page: 1,
      last_page: 1,
      next_page_url: null,
      prev_page_url: null,
    },
      form: { id: null, name: '', image: null,image_preview: null, description: '' },
      formErrors: {},
      modalOpen: false,
      deleteModalOpen: false,

      perPage: 5,
      search: '',

      async fetchCategories(url = null) {
      try {
        const params = new URLSearchParams({
          page: this.pagination.current_page,
          per_page: this.perPage,
          search: this.search
        });
        const finalUrl = url || `/admin/categories?${params.toString()}`;
        const res = await fetch(finalUrl);
        const data = await res.json();
        // console.log('fetchCategories: ',data.data[0]['image_url']);
        this.categories = data.data;
        this.pagination = {
          current_page: data.current_page,
          last_page: data.last_page,
          next_page_url: data.next_page_url,
          prev_page_url: data.prev_page_url
        };
      } catch (err) {
        Toastify({ text: "Erreur de chargement", backgroundColor: "red" }).showToast();
      }
    },

      openForm(category = null) {
        this.formErrors = {};
        this.form = category ? { ...category, image_preview: category.image ? `/storage/${category.image}` : null } : { id: null, name: '',image: null,image_preview: null, description: '' };
        this.modalOpen = true;
      },

      closeForm() {
        this.modalOpen = false;
      },

      handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
            this.form.image = file;
            this.form.image_preview = URL.createObjectURL(file);
        }
     },

     async saveCategory() {
        try {
            const formData = new FormData();
            formData.append('name', this.form.name);
            formData.append('description', this.form.description);
            if (this.form.image instanceof File) formData.append('image', this.form.image);

            const isEdit = !!this.form.id;
            const url = isEdit ? `/admin/categories/${this.form.id}` : '/admin/categories';
            const method = 'POST';

            if (isEdit) {
            formData.append('_method', 'PUT');
            }

            const res = await fetch(url, {
            method,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: formData
            });

            const data = await res.json();

            if (res.status === 422) {
            this.formErrors = data.errors || {};
            Toastify({ text: data.message || "Erreur de validation", backgroundColor: "red" }).showToast();
            return;
            }

            if (res.ok) { // status 200-299
            this.fetchCategories();
            this.closeForm();
            Toastify({ text: isEdit ? "Catégorie modifiée" : "Catégorie ajoutée", backgroundColor: "#7a6b5f" }).showToast();
            } else {
            this.formErrors = data.errors || {};
            Toastify({ text: data.message || "Erreur lors de l’enregistrement", backgroundColor: "red" }).showToast();
            }

        } catch (err) {
            // console.error(err);
            Toastify({ text: "Erreur réseau", backgroundColor: "red" }).showToast();
        }
     },

      openDeleteModal(id) {
        this.form.id = id;
        this.deleteModalOpen = true;
      },

      closeDeleteModal() {
        this.deleteModalOpen = false;
      },

      async deleteCategory(id) {
        try {
          const res = await fetch(`/admin/categories/${this.form.id}`, {
            method: 'DELETE',
            headers: {
              'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
            }
          });

          if (!res.ok) throw new Error('Erreur serveur');

          await this.fetchCategories();
          this.closeDeleteModal();
          Toastify({ text: "Catégorie supprimée", backgroundColor: "red" }).showToast();
        } catch (err) {
          Toastify({ text: "Erreur lors de la suppression", backgroundColor: "red" }).showToast();
        }
      }
    }
  }
</script>

@endsection
