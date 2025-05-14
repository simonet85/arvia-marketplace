<!-- resources/views/auth/login.blade.php -->
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
        <h2 class="text-2xl font-bold text-center text-[#7a6b5f] mb-6">Connexion à Arvía</h2>


            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Adresse e-mail
                    </label>
                    <input type="email" name="email" required autofocus
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]"
                        value="{{ old('email') }}" placeholder="votre-adresse-email@example.com">
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Mot de passe
                        <span class="text-sm text-gray-500">(minimum 8 caractères)</span>
                    </label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7a6b5f]">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox text-[#7a6b5f]">
                        <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-[#7a6b5f] hover:underline" href="{{ route('password.request') }}">
                            Mot de passe oublié ?
                        </a>
                    @endif
                </div>

                <button type="submit"
                    class="w-full bg-[#7a6b5f] text-white py-2 rounded-lg hover:bg-[#655b51] transition">
                    Se connecter
                </button>
            </form>

            <p class="mt-6 text-sm text-center text-gray-600">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-[#7a6b5f] hover:underline">Créer un compte</a>
            </p>
        </div>
    </div>
</x-guest-layout>

