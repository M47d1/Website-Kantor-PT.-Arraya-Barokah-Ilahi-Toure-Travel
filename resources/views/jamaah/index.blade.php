@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-blue-700">📋 Daftar Jamaah</h1>

<a href="{{ route('jamaah.create') }}"
    class="mb-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
    + Tambah Jamaah
</a>

@if(session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto bg-white rounded shadow">
    <table class="w-full text-sm text-gray-700">
        <thead class="bg-blue-50 text-gray-700 sticky top-0">
            <tr>
                <th class="px-4 py-3 text-left">No</th>
                <th class="px-4 py-3 text-left">Nama</th>
                <th class="px-4 py-3 text-left">NIK</th>
                <th class="px-4 py-3 text-left">Mitra</th>
                <th class="px-4 py-3 text-left">No. HP</th>
                <th class="px-4 py-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jamaahs as $jamaah)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 font-semibold text-blue-700">{{ $jamaah->nama_lengkap }}</td>
                <td class="px-4 py-2">{{ $jamaah->nik }}</td>
                <td class="px-4 py-2">
                    {{ $jamaah->mitra ? $jamaah->mitra->nama_lengkap : '-' }}
                </td>
                <td class="px-4 py-2">{{ $jamaah->no_hp }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('jamaah.edit', $jamaah) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs shadow">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('jamaah.destroy', $jamaah) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus jamaah ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs shadow">
                            🗑 Hapus
                        </button>
                    </form>
                    <!-- Tombol Print PDF -->
                    <a href="{{ route('jamaah.cetak', $jamaah) }}" target="_blank"
                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs shadow">
                        🖨 PDF
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center p-4 text-gray-500">Belum ada data Jamaah.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $jamaahs->links() }}
</div>
@endsection
