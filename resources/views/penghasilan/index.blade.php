@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-purple-700">💰 Daftar Penghasilan Mitra</h1>

@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('penghasilan.ambil') }}" method="POST">
    @csrf

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full text-sm text-gray-700">
            <thead class="bg-purple-50 text-gray-700 sticky top-0">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Mitra</th>
                    <th class="px-4 py-3 text-left">Jamaah Langsung</th>
                    <th class="px-4 py-3 text-left">Penghasilan Sendiri</th>
                    <th class="px-4 py-3 text-left">Bonus Sponsor</th>
                    <th class="px-4 py-3 text-left">Total Penghasilan</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penghasilan as $index => $item)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $item['nama'] ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $item['jumlah_jamaah'] ?? 0 }}</td>
                    <td class="px-4 py-2 text-green-600 font-medium">
                        Rp {{ number_format((int) $item['penghasilan'] ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 text-yellow-600 font-medium">
                        Rp {{ number_format((int) $item['bonus_sponsor'] ?? 0, 0, ',', '.') }}
                    </td>
                    <td class="px-4 py-2 text-purple-700 font-semibold">
                        {{ $item['total_penghasilan'] ?? 'Rp 0' }}
                    </td>
                    <td class="px-4 py-2">
                        <input type="checkbox" name="penghasilan_diambil[]" value="{{ $item['nama'] }}"
                            class="w-5 h-5 text-purple-600 border-gray-300 rounded focus:ring-purple-500">
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-gray-500 py-4">Tidak ada data penghasilan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</form>
@endsection
