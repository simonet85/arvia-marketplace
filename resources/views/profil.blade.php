<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Arvía - Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg hidden md:block">
      <div class="p-6 border-b">
        <h1 class="text-2xl font-bold text-[#7a6b5f]">Arvía</h1>
      </div>
      <nav class="p-6 space-y-4 text-sm">
        <a href="./tableau-de-bord.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-home mr-2"></i>Tableau de Bord</a
        >
        <a href="./gestion-des-produits.html" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-box mr-2"></i>Produits</a
        >
        <a
          href="./gestion-des-categories.html"
          class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-list mr-2"></i> Catégories</a
        >
        <a
          href="./gestion-des-commandes.html"
          class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-truck mr-2"></i>Commandes</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-shipping-fast mr-2"></i>Suivi</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-bell mr-2"></i>Notifications</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-user mr-2"></i>Profil</a
        >
        <a href="#" class="block hover:text-[#7a6b5f]"
          ><i class="fas fa-bicycle mr-2"></i>Coursiers</a
        >
      </nav>
    </aside>

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
  </body>
</html>

