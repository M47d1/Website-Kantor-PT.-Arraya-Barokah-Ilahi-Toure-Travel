@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-blue-700">📋 Daftar Mitra</h1>

<a href="{{ route('mitra.create') }}"
    class="mb-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
    + Tambah Mitra
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
                <th class="px-4 py-3 text-left">Foto</th>
                <th class="px-4 py-3 text-left">Kode</th>
                <th class="px-4 py-3 text-left">Nama Lengkap</th>
                <th class="px-4 py-3 text-left">NIK</th>
                <th class="px-4 py-3 text-left">No. HP</th>
                <th class="px-4 py-3 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mitras as $mitra)
            <tr class="border-t hover:bg-gray-50">
                <td class="px-4 py-2">
                    @if ($mitra->foto)
                        <img src="{{ asset('storage/' . $mitra->foto) }}" class="w-10 h-10 rounded-full object-cover border">
                    @else
                        <span class="text-gray-400 italic">Tidak ada</span>
                    @endif
                </td>
                <td class="px-4 py-2 font-semibold text-blue-700">{{ $mitra->kode_mitra }}</td>
                <td class="px-4 py-2">{{ $mitra->nama_lengkap }}</td>
                <td class="px-4 py-2">{{ $mitra->nik }}</td>
                <td class="px-4 py-2">{{ $mitra->no_hp }}</td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('mitra.edit', $mitra) }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs shadow">
                        ✏️ Edit
                    </a>
                    <form action="{{ route('mitra.destroy', $mitra) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus mitra ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs shadow">
                            🗑 Hapus
                        </button>
                    </form>
                    <!-- Tombol Print PDF -->
                    <a href="{{ route('mitra.print', $mitra->id) }}" target="_blank"
                    class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs shadow">
                        🖨 PDF
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
