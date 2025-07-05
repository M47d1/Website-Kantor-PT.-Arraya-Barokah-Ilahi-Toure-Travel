@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">💰 Laporan Penghasilan Mitra</h1>

<table class="w-full table-auto border-collapse">
    <thead>
        <tr class="bg-gray-100 text-left text-sm">
            <th class="px-4 py-2 border">#</th>
            <th class="px-4 py-2 border">Nama Mitra</th>
            <th class="px-4 py-2 border">Jamaah Langsung</th>
            <th class="px-4 py-2 border">Penghasilan Sendiri</th>
            <th class="px-4 py-2 border">Bonus Sponsor</th>
            <th class="px-4 py-2 border">Total Penghasilan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($penghasilan as $index => $item)
        <tr class="text-sm">
            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
            <td class="px-4 py-2 border">{{ $item['nama'] ?? '-' }}</td>
            <td class="px-4 py-2 border">{{ $item['jumlah_jamaah'] ?? 0 }}</td>
            <td class="px-4 py-2 border">Rp {{ number_format($item['penghasilan'] ?? 0, 0, ',', '.') }}</td>
            <td class="px-4 py-2 border">Rp {{ number_format($item['bonus_sponsor'] ?? 0, 0, ',', '.') }}</td>
            <td class="px-4 py-2 border">{{ $item['total_penghasilan'] }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-gray-500 py-4">Tidak ada data penghasilan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
