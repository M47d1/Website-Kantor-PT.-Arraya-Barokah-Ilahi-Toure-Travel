<nav class="bg-blue-600 text-white shadow px-6 py-4 flex justify-between items-center">
    <!-- Kiri: Judul -->
    <div class="text-lg font-semibold">
        🕌 Arraya Travel Admin
    </div>

    <!-- Kanan: Profil Dropdown -->
    <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
            <span class="text-sm">{{ Auth::user()->name }}</span>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown -->
        <div x-show="open" @click.away="open = false"
            class="absolute right-0 mt-2 w-40 bg-white text-gray-700 rounded shadow-lg z-50">
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 hover:bg-gray-100 text-sm">Profil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-sm text-red-600">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>
