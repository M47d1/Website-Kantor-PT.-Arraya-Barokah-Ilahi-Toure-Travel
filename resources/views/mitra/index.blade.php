@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Mitra</h1>

<a href="{{ route('mitra.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Mitra</a>

@if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
@endif

<table class="w-full border text-sm">
    <thead class="bg-gray-200 text-left">
        <tr>
            <th class="p-2">Foto</th>
            <th class="p-2">Kode</th>
            <th class="p-2">Nama</th>
            <th class="p-2">NIK</th>
            <th class="p-2">No HP</th>
            <th class="p-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mitras as $mitra)
        <tr class="border-t">
            <td class="p-2">
                @if ($mitra->foto)
                    <img src="{{ asset('storage/' . $mitra->foto) }}" class="w-10 h-10 rounded-full">
                @else
                    <span class="text-gray-400">-</span>
                @endif
            </td>
            <td class="p-2">{{ $mitra->kode_mitra }}</td>
            <td class="p-2">{{ $mitra->nama_lengkap }}</td>
            <td class="p-2">{{ $mitra->nik }}</td>
            <td class="p-2">{{ $mitra->no_hp }}</td>
            <td class="p-2 space-x-2">
                <a href="{{ route('mitra.edit', $mitra) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('mitra.destroy', $mitra) }}" method="POST" class="inline"
                      onsubmit="return confirm('Yakin ingin hapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
