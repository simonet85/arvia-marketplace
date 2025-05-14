@extends('layouts.app-dashboard')
@section('title', 'Mon Profil')
@section('content')

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto p-6">
      <header class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-[#7a6b5f]">Mon Profil</h2>
        <a href="#" class="text-[#7a6b5f] hover:text-[#5e5148]"
          ><i class="fas fa-lock mr-2"></i>Restauration du mot de passe</a
        >
      </header>

      <section class="bg-white p-6 rounded shadow">
        <form class="space-y-4 max-w-xl">
          <div class="flex items-center">
            <img
              src="https://i.pravatar.cc/100"
              class="w-12 h-12 mr-4 rounded-full"
              alt="Photo de profil"
            />
            <label class="block text-gray-700 cursor-pointer" for="photo">
              <i class="fas fa-camera mr-2"></i> Choisir une photo
            </label>
            <input
              type="file"
              id="photo"
              class="hidden"
              accept=".jpg, .jpeg, .png"
            />
          </div>
          <div>
            <label class="block text-gray-700">Nom</label>
            <input
              type="text"
              class="w-full border px-4 py-2 rounded"
              value="Jean Dupont"
            />
          </div>
          <div>
            <label class="block text-gray-700">Email</label>
            <input
              type="email"
              class="w-full border px-4 py-2 rounded"
              value="jean@example.com"
            />
          </div>
          <div>
            <label class="block text-gray-700">Mot de passe</label>
            <input
              type="password"
              class="w-full border px-4 py-2 rounded"
              placeholder="••••••••"
            />
          </div>
          <div>
            <label class="block text-gray-700">Confirmation du mot de passe</label>
            <input
              type="password"
              class="w-full border px-4 py-2 rounded"
              placeholder="••••••••"
            />
          </div>
          <button
            class="bg-[#7a6b5f] text-white px-4 py-2 rounded hover:bg-[#5e5148]"
          >
            Mettre à jour
          </button>
        </form>
      </section>

      <section class="bg-white p-6 rounded shadow mt-6">
        <h2 class="text-2xl font-bold text-[#7a6b5f]">Informations de compte</h2>
        <ul class="list-inside list-disc mt-4">
          <li>
            <span class="font-bold">Date d'enregistrement :</span>
            <span class="ml-2">12/02/2023</span>
          </li>
          <li>
            <span class="font-bold">Dernière connexion :</span>
            <span class="ml-2">12/02/2023</span>
          </li>
        </ul>
      </section>
    </main>
    
@endsection

