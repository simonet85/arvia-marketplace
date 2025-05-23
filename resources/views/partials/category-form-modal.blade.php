<!-- Modal formulaire -->
<div x-show="modalOpen" x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
  <div @click.away="closeForm"
       class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg transform transition-all duration-300">
    <div class="flex justify-between items-center mb-4">

      <!-- <h3 class="text-xl font-bold text-[#7a6b5f]">Ajouter / Modifier Catégorie</h3> -->
      <template x-if="form.id">
        <h3 class="text-xl font-bold text-[#7a6b5f]" x-text="'Modifier Catégorie ' + form.name"></h3>
      </template>
      <template x-if="!form.id">
        <h3 class="text-xl font-bold text-[#7a6b5f]">Ajouter Catégorie</h3>
      </template>

      <button @click="closeForm" class="text-gray-500 hover:text-gray-800">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <form @submit.prevent="saveCategory" enctype="multipart/form-data">
      <div class="mb-4">
        <label class="block mb-1 text-sm font-medium text-gray-700">Nom</label>
        <input type="text" x-model="form.name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]" />
        <template x-if="formErrors.name">
          <p class="text-red-500 text-sm mt-1" x-text="formErrors.name[0]"></p>
        </template>

      </div>
      <div class="mb-4">
        <label class="block mb-1 text-sm font-medium text-gray-700">Description</label>
        <textarea x-model="form.description" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]"></textarea>
        <template x-if="formErrors.name">
          <p class="text-red-500 text-sm mt-1" x-text="formErrors.name[0]"></p>
        </template>

      </div>
      <div class="mb-4">
        <label class="block mb-1 text-sm font-medium text-gray-700">Image</label>
        
        <input type="file" @change="handleImageUpload" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50">

        <template x-if="form.image_preview">
          <img :src="form.image_preview" alt="Preview" class="mt-2 h-20 object-cover rounded">
        </template>
        <template x-if="formErrors.name">
          <p class="text-red-500 text-sm mt-1" x-text="formErrors.name[0]"></p>
        </template>

        <!--Aperçu de l'image-->
        <!-- <div class="mt-2" x-show="form.image_preview || form.image">
          <img :src="form.image_preview || ('/storage/' + form.image)" alt="Aperçu de l'image" class="h-20 object-cover rounded">
        </div> -->

      </div>
      <div class="flex justify-end gap-2">
        <button type="button" @click="closeForm" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Annuler</button>
        <button type="submit" class="px-4 py-2 bg-[#7a6b5f] text-white rounded hover:bg-[#5e5148] transition">Enregistrer</button>
      </div>
    </form>
  </div>
</div>
