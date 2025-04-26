<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion - Arvéa Nature</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-white flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-xl">
      <div class="flex items-center justify-center mb-4">
        <img
          src="https://res.cloudinary.com/dfb5wjqvk/image/upload/v1648530115/logo-arvea-nature-vert-400_xq4gkj.svg"
          alt="Logo Arvéa Nature"
          class="h-12 w-auto"
        />
      </div>
      <h2 class="text-2xl font-serif text-gray-800 mb-6 text-center">
        Connexion
      </h2>
      <form class="space-y-4">
        <div>
          <label class="block text-sm text-gray-700 mb-1">Adresse e-mail</label>
          <input
            type="email"
            placeholder="exemple@domaine.com"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-beige-500"
            required
          />
        </div>
        <div>
          <label class="block text-sm text-gray-700 mb-1">Mot de passe</label>
          <input
            type="password"
            placeholder="••••••••"
            class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-beige-500"
            required
          />
        </div>
        <div class="flex justify-between items-center text-sm">
          <label class="inline-flex items-center">
            <input type="checkbox" class="form-checkbox text-beige-600" />
            <span class="ml-2 text-gray-600">Se souvenir de moi</span>
          </label>
          <a href="#" class="text-beige-600 hover:underline"
            >Mot de passe oublié ?</a
          >
        </div>
        <button
          type="submit"
          class="w-full bg-beige-600 hover:bg-beige-700 text-white py-3 rounded-lg transition duration-300"
        >
          Se connecter
        </button>
      </form>
      <p class="text-center text-sm text-gray-600 mt-4">
        Pas encore inscrit ?
        <a href="register.html" class="text-beige-600 hover:underline"
          >Créer un compte</a
        >
      </p>
    </div>
  </body>
</html>
