<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mon Panier</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-50 text-gray-800">
    <header class="flex justify-between items-center p-4 bg-white shadow">
      <h1 class="text-xl font-bold">Mon Panier</h1>
      <a href="products.html" class="text-sm text-blue-600"
        >← Retour au catalogue</a
      >
    </header>

    <main class="p-4 space-y-4" id="panier-container"></main>

    <script>
      function afficherPanier() {
        const panier = JSON.parse(localStorage.getItem("panier")) || [];
        const container = document.getElementById("panier-container");
        container.innerHTML = "";

        if (panier.length === 0) {
          container.innerHTML =
            "<p class='text-center text-gray-500'>Votre panier est vide.</p>";
          return;
        }

        panier.forEach((prod, index) => {
          const item = document.createElement("div");
          item.className =
            "flex items-center justify-between bg-white p-4 rounded shadow";

          item.innerHTML = `
          <div class="flex items-center gap-4">
            <img src="${prod.image}" alt="${prod.nom}" class="w-16 h-16 object-cover rounded">
            <div>
              <h2 class="font-semibold">${prod.nom}</h2>
              <p class="text-sm text-gray-600">${prod.prix} €</p>
            </div>
          </div>
          <button onclick="supprimerArticle(${index})" class="text-red-600 hover:text-red-800">Supprimer</button>
        `;
          container.appendChild(item);
        });
      }

      function supprimerArticle(index) {
        let panier = JSON.parse(localStorage.getItem("panier")) || [];
        panier.splice(index, 1);
        localStorage.setItem("panier", JSON.stringify(panier));
        afficherPanier();
      }

      document.addEventListener("DOMContentLoaded", afficherPanier);
    </script>
  </body>
</html>
