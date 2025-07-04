@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Daftar Jamaah</h1>

@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="mb-4">
    <a href="{{ route('jamaah.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
        + Tambah Jamaah
    </a>
</div>

<table class="w-full border text-sm">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-3 py-2">#</th>
            <th class="border px-3 py-2">Nama</th>
            <th class="border px-3 py-2">NIK</th>
            <th class="border px-3 py-2">Mitra</th>
            <th class="border px-3 py-2">No HP</th>
            <th class="border px-3 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jamaahs as $jamaah)
        <tr>
            <td class="border px-3 py-2">{{ $loop->iteration }}</td>
            <td class="border px-3 py-2">{{ $jamaah->nama_lengkap }}</td>
            <td class="border px-3 py-2">{{ $jamaah->nik }}</td>
            <td class="border px-3 py-2">
                {{ $jamaah->mitra ? $jamaah->mitra->nama_lengkap : '-' }}
            </td>
            <td class="border px-3 py-2">{{ $jamaah->no_hp }}</td>
            <td class="border px-3 py-2 space-x-1">
                <a href="{{ route('jamaah.edit', $jamaah) }}" class="text-blue-600 hover:underline">Edit</a>
                <form action="{{ route('jamaah.destroy', $jamaah) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="border px-3 py-2 text-center text-gray-500">Belum ada data.</td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-4">
    {{ $jamaahs->links() }}
</div>
@endsection
