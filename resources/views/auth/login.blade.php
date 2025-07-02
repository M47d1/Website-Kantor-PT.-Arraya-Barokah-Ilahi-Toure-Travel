<x-guest-layout>
    <div class="w-full max-w-md bg-white/50 backdrop-blur-md rounded-xl shadow-xl px-4 sm:px-8 py-6 sm:py-8 mx-4">
        <div class="flex justify-center mb-4">
            <img src="{{ asset('asset/image/ABI.png') }}" alt="Logo" class="h-16">
        </div>

        <h2 class="text-2xl font-bold text-center text-gray-800 mb-4">Masuk ke Akun Anda</h2>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-1">Email</label>
                <input id="email" type="email" name="email" required autofocus
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-semibold mb-1">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="form-checkbox text-blue-600">
                <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-5 rounded shadow-md transition">
                    Masuk
                </button>

                @if (Route::has('password.request'))
                    <a class="text-sm text-blue-600 hover:underline ml-2" href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                @endif
            </div>
        </form>

        <div class="mt-6 text-center text-gray-600 italic">
            Semoga Allah mempermudah langkahmu menuju Baitullah
        </div>
    </div>
</x-guest-layout>
