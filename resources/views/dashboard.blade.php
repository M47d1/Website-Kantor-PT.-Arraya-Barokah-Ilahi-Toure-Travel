@extends('layouts.admin')

@section('content')
<!-- Judul -->
<div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">📊 Dashboard Utama</h1>
    <p class="text-sm text-gray-500">Selamat datang, {{ Auth::user()->name }}.</p>
</div>

<!-- Kartu Statistik -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg border-l-4 border-blue-600 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Jumlah Mitra</p>
                <h2 class="text-2xl font-bold text-blue-700">{{ \App\Models\Mitra::count() }}</h2>
            </div>
            <i class="bi bi-people-fill text-3xl text-blue-500"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg border-l-4 border-green-600 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Jumlah Jamaah</p>
                <h2 class="text-2xl font-bold text-green-700">{{ \App\Models\Jamaah::count() }}</h2>
            </div>
            <i class="bi bi-person-lines-fill text-3xl text-green-500"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg border-l-4 border-yellow-500 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Total Penghasilan</p>
                <h2 class="text-2xl font-bold text-yellow-600">Rp {{ number_format(54200000, 0, ',', '.') }}</h2>
            </div>
            <i class="bi bi-wallet2 text-3xl text-yellow-500"></i>
        </div>
    </div>

    <div class="bg-white p-5 rounded-xl shadow hover:shadow-lg border-l-4 border-red-500 transition">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Paket Aktif</p>
                <h2 class="text-2xl font-bold text-red-600">3</h2>
            </div>
            <i class="bi bi-geo-alt-fill text-3xl text-red-500"></i>
        </div>
    </div>
</div>

<!-- Grafik -->
<div class="bg-white p-6 rounded-xl shadow hover:shadow-lg">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">📈 Grafik Jamaah per Bulan</h3>
    <canvas id="jamaahChart" height="100"></canvas>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('jamaahChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul'],
            datasets: [{
                label: 'Jamaah',
                data: [12, 18, 15, 25, 20, 30, 40],
                backgroundColor: '#2563eb'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
@endpush
