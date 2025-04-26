<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Arvía - Notifications</title>
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
        <h2 class="text-2xl font-bold text-[#7a6b5f]">Notifications</h2>
        <button class="md:hidden p-2 text-[#7a6b5f]">
          <i class="fas fa-bars"></i>
        </button>
      </header>

      <section class="p-6 bg-white rounded shadow">
        <ul class="space-y-4">
          <li class="flex items-start gap-4 border-b pb-4">
            <i class="fas fa-box-open text-[#7a6b5f] text-xl"></i>
            <div>
              <strong class="block">Nouveau produit ajouté</strong>
              <p class="text-sm text-gray-600">
                Le produit “Savon Bio” a été ajouté avec succès.
              </p>
            </div>
          </li>
          <li class="flex items-start gap-4 border-b pb-4">
            <i class="fas fa-shipping-fast text-[#7a6b5f] text-xl"></i>
            <div>
              <strong class="block">Commande expédiée</strong>
              <p class="text-sm text-gray-600">
                La commande #1024 a été expédiée.
              </p>
            </div>
          </li>
          <!-- + autres notifications dynamiques -->
        </ul>
      </section>
    </main>
  </body>
</html>
