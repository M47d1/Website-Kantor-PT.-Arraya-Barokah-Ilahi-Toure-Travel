<aside 
    :class="sidebarOpen 
        ? 'translate-x-0 md:translate-x-0' 
        : '-translate-x-full md:translate-x-0'"
    class="fixed md:relative z-30 top-[64px] h-[calc(100vh-64px)] w-64 bg-white border-r shadow-md transform transition-transform duration-300 ease-in-out"
>
    <!-- Logo -->
    <div class="p-4 flex justify-center border-b border-gray-200">
        <img src="{{ asset('asset/image/ABI.png') }}" alt="Logo" class="h-25 w-auto object-contain">
    </div>

    <!-- Navigasi -->
    <nav class="p-4 space-y-1 text-sm text-gray-700">
        <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 font-semibold text-indigo-700' : '' }}">
            <i class="bi bi-house-door-fill me-2"></i> Dashboard
        </a>

        <a href="{{ route('mitra.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 {{ request()->routeIs('mitra.*') ? 'bg-indigo-50 font-semibold text-indigo-700' : '' }}">
            <i class="bi bi-people-fill me-2"></i> Mitra
        </a>

        <a href="{{ route('jamaah.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 {{ request()->routeIs('jamaah.*') ? 'bg-indigo-50 font-semibold text-indigo-700' : '' }}">
            <i class="bi bi-person-lines-fill me-2"></i> Jamaah
        </a>

        <a href="{{ route('keberangkatan.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 {{ request()->routeIs('keberangkatan.*') ? 'bg-indigo-50 font-semibold text-indigo-700' : '' }}">
            <i class="bi bi-geo-alt-fill me-2"></i> Keberangkatan
        </a>

        <a href="{{ route('penghasilan.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 {{ request()->routeIs('penghasilan.*') ? 'bg-indigo-50 font-semibold text-indigo-700' : '' }}">
            <i class="bi bi-wallet2 me-2"></i> Penghasilan
        </a>

        <div class="mt-6 mb-2 text-xs font-semibold uppercase text-gray-400 tracking-wider">
            Laporan
        </div>

        <a href="{{ route('laporan.bulanan') }}" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 {{ request()->routeIs('laporan.bulanan') ? 'bg-indigo-50 font-semibold text-indigo-700' : '' }}">
            <i class="bi bi-calendar3 me-2"></i> Bulanan
        </a>

        <a href="{{ route('laporan.tahunan') }}" class="flex items-center px-3 py-2 rounded hover:bg-indigo-100 {{ request()->routeIs('laporan.tahunan') ? 'bg-indigo-50 font-semibold text-indigo-700' : '' }}">
            <i class="bi bi-calendar-range me-2"></i> Tahunan
        </a>
    </nav>
</aside>
