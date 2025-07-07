<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

<div x-data="{ sidebarOpen: false }" class="h-screen flex overflow-hidden relative">

    <!-- Overlay untuk mobile/desktop -->
    <div 
        x-show="sidebarOpen"
        @click="sidebarOpen = false"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-50 z-20"
    ></div>

    <!-- Sidebar -->
    <aside 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed z-30 top-[64px] h-[calc(100vh-64px)] left-0 w-64 bg-white border-r shadow-md transform transition-transform duration-300 ease-in-out"
    >
        @include('components.sidebar')
    </aside>

    <!-- Konten Utama -->
    <div class="flex-1 flex flex-col overflow-hidden">

        <!-- Navbar -->
        <nav class="bg-blue-600 text-white shadow px-6 py-4 flex justify-between items-center relative z-10">
            <div class="flex items-center space-x-4">
                <!-- Tombol Toggle -->
                <button @click="sidebarOpen = !sidebarOpen" class="focus:outline-none">
                    <i class="bi bi-list text-2xl text-white"></i>
                </button>
                <h1 class="text-lg font-semibold">
                    Ahlan Wasahlan Admin Travel PT. Arraya Barokah Ilahi
                </h1>
            </div>

            <!-- Profil Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <span class="text-sm">{{ Auth::user()->name }}</span>
                    <i class="bi bi-caret-down-fill"></i>
                </button>
                <div x-show="open" @click.away="open = false" x-transition
                    class="absolute right-0 mt-2 w-40 bg-white text-gray-700 rounded shadow-lg z-50">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-100 text-sm">Profil</a>
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

        <!-- Konten Halaman -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
