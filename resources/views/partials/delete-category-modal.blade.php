<div x-show="deleteModalOpen" x-cloak
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95"
     class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50">
  <div @click.away="closeDeleteModal"
       class="bg-white p-6 rounded-lg w-full max-w-md shadow-lg transform transition-all duration-300">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-xl font-bold text-[#7a6b5f]">Supprimer une Catégorie</h3>
      <button @click="closeDeleteModal" class="text-gray-500 hover:text-gray-800">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <p>Confirmez-vous la suppression de cette catégorie ?</p>
    <div class="flex justify-end gap-2 mt-4">
      <button type="button" @click="closeDeleteModal" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Annuler</button>
      <button type="button" @click="deleteCategory" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">Supprimer</button>
    </div>
  </div>
</div>
