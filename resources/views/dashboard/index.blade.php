@extends('layouts.admin')

@section('content')

<div class="p-6">
    <h1 class="text-3xl font-extrabold text-gray-800 mb-8">📊 Dashboard Admin</h1>

    {{-- 🔢 Kartu Statistik --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
        @php
            $cards = [
                ['title' => 'Total Mitra', 'value' => $totalMitra, 'icon' => '<path d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m0 0V5a2 2 0 114 0v9m-4 0h4"/>', 'color' => 'from-blue-500 to-blue-600'],
                ['title' => 'Total Jamaah', 'value' => $totalJamaah, 'icon' => '<path d="M5 20h14M12 4v16m0-16l4 4m-4-4l-4 4" />', 'color' => 'from-green-500 to-green-600'],
                ['title' => 'Keberangkatan', 'value' => $totalKeberangkatan ?? 0, 'icon' => '<path d="M2 16l10-8 10 8" />', 'color' => 'from-yellow-400 to-yellow-500'],
                ['title' => 'Total Penghasilan', 'value' => 'Rp ' . number_format($totalPenghasilan, 0, ',', '.'), 'icon' => '<path d="M12 8c-2.5 0-3 2-3 3s.5 3 3 3 3-1.5 3-3-.5-3-3-3z" /><path d="M12 12v1m0-6v1m-6 6h.01M18 12h.01" />', 'color' => 'from-purple-500 to-purple-600'],
            ];
        @endphp

        @foreach ($cards as $card)
            <div class="bg-gradient-to-r {{ $card['color'] }} text-white rounded-xl shadow-lg p-5 hover:scale-[1.02] transition-transform duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-sm font-semibold text-white/90 uppercase tracking-wide">{{ $card['title'] }}</h3>
                        <p class="text-4xl font-extrabold mt-1 text-white">{{ $card['value'] }}</p>
                    </div>
                    <div class="bg-white/20 p-3 rounded-full">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            {!! $card['icon'] !!}
                        </svg>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- 📊 Grafik Bar --}}
    <div class="bg-white p-6 rounded-lg shadow mb-10">
        <h2 class="text-xl font-bold text-gray-700 mb-4">📊 Statistik Total</h2>
        <canvas id="barChart" height="100"></canvas>
    </div>

    {{-- 📈 Grafik Garis (Monthly Recap) --}}
    <div class="bg-white p-6 rounded-lg shadow mb-10">
        <h2 class="text-xl font-bold text-gray-700 mb-4">📈 Jamaah Masuk per Bulan</h2>
        <canvas id="lineChart" height="100"></canvas>
    </div>

    {{-- 🥧 Grafik Donat --}}
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold text-gray-700 mb-4">🥧 Komposisi Jamaah (Laki-laki / Perempuan)</h2>
        <canvas id="pieChart" height="100"></canvas>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // 📊 Grafik Bar Horizontal
    new Chart(document.getElementById('barChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: ['Mitra', 'Jamaah'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $totalMitra }}, {{ $totalJamaah }}],
                backgroundColor: ['#3b82f6', '#22c55e'],
                borderRadius: 6,
                barThickness: 20
            }]
        },
        options: {
            indexAxis: 'y', // ⬅️ bar horizontal
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: { color: '#6b7280' },
                    grid: { color: '#e5e7eb' }
                },
                y: {
                    ticks: { color: '#6b7280' },
                    grid: { display: false }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });


    // 📈 Line Chart
    new Chart(document.getElementById('lineChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: {!! json_encode($bulanLabels) !!},
            datasets: [{
                label: '📅 Jamaah Masuk',
                data: {!! json_encode($jumlahJamaahPerBulan) !!},
                fill: true,
                backgroundColor: 'rgba(59, 130, 246, 0.1)',
                borderColor: '#3b82f6',
                tension: 0.4,
                pointBackgroundColor: '#3b82f6',
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: '#374151',
                        font: { size: 14 }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#6b7280' },
                    grid: { color: '#e5e7eb' }
                },
                x: {
                    ticks: { color: '#6b7280' },
                    grid: { display: false }
                }
            }
        }
    });

    // 🥧 Doughnut Chart
    new Chart(document.getElementById('pieChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                data: [{{ $totalLaki }}, {{ $totalPerempuan }}],
                backgroundColor: ['#3b82f6', '#f472b6'],
                borderWidth: 2,
                borderColor: '#fff',
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#374151',
                        font: { size: 14 }
                    }
                }
            }
        }
    });
</script>
@endpush
