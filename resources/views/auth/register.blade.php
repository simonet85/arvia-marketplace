<!-- resources/views/auth/register.blade.php -->
<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">
        <div class="flex items-center justify-center mb-6">
            <a href="{{ url('/') }}">
                {{-- Logo --}}
                {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-20 h-20"> --}}
                {{-- Logo SVG --}}
                <x-application-logo class="w-20 h-20 fill-current text-[#7a6b5f]" />
            </a>
        </div>
        <h2 class="text-2xl font-bold text-center text-[#7a6b5f] mb-6">Créer un compte Arvía</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                    <input type="text" name="name" required autofocus
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]"
                        value="{{ old('name') }}">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Adresse e-mail</label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]"
                        value="{{ old('email') }}">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mot de passe</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]">
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]">
                </div>

                <button type="submit"
                    class="w-full bg-[#7a6b5f] text-white py-2 rounded-lg hover:bg-[#655b51] transition">
                    S'inscrire
                </button>
            </form>

            <p class="mt-6 text-sm text-center text-gray-600">
                Vous avez déjà un compte ?
                <a href="{{ route('login') }}" class="text-[#7a6b5f] hover:underline">Se connecter</a>
            </p>
        </div>
    </div>
</x-guest-layout>
