@extends('layouts.admin')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-green-700">📋 Data Pemberangkatan</h1>
    <a href="{{ route('keberangkatan.create') }}" class="inline-flex items-center bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded shadow">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Tambah Pemberangkatan
    </a>
</div>

<div class="overflow-x-auto bg-white rounded shadow">
    <table class="w-full text-sm text-gray-700">
        <thead class="bg-green-700 text-white sticky top-0">
            <tr>
                <th class="px-4 py-3 text-left">No.</th>
                <th class="px-4 py-3 text-left">Tanggal Berangkat</th>
                <th class="px-4 py-3 text-left">Nama Paket</th>
                <th class="px-4 py-3 text-left">Gelombang</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Total Jamaah</th>
                <th class="px-4 py-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($keberangkatans as $index => $item)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ sprintf('%02d.', $index + 1) }}</td>
                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal_berangkat)->translatedFormat('d F Y') }}</td>
                <td class="px-4 py-2">{{ $item->nama_paket }}</td>
                <td class="px-4 py-2">{{ $item->gelombang }}</td>
                <td class="px-4 py-2">{{ $item->status }}</td>
                <td class="px-4 py-2 font-bold text-center">
                    {{ $item->jamaah_count }}
                </td>
                <td class="px-4 py-3 flex flex-wrap gap-2">
                    <a href="{{ route('keberangkatan.edit', $item->id) }}" class="text-yellow-600 hover:underline">✏️ Edit</a>
                    <a href="{{ route('keberangkatan.atur-jamaah', $item->id) }}" class="text-green-600 hover:underline">👥 Jamaah</a>
                    <a href="{{ route('keberangkatan.export', $item->id) }}" class="text-blue-600 hover:underline">📥 Excel</a>
                    <form action="{{ route('keberangkatan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center text-gray-500 py-4">Belum ada data pemberangkatan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
