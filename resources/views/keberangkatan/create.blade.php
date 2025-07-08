@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-green-700">➕ Tambah Pemberangkatan</h1>

@if($errors->any())
    <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('keberangkatan.store') }}" method="POST" class="bg-white p-6 rounded shadow w-full max-w-lg">
    @csrf

    <div class="mb-4">
        <label class="block font-semibold mb-1">Tanggal Berangkat</label>
        <input type="date" name="tanggal_berangkat" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Nama Paket</label>
        <input type="text" name="nama_paket" class="w-full border rounded px-3 py-2" placeholder="Contoh: Umrah Reguler" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Gelombang</label>
        <input type="text" name="gelombang" class="w-full border rounded px-3 py-2" placeholder="Contoh: Gel. 1" required>
    </div>

    <div class="mb-6">
        <label class="block font-semibold mb-1">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            <option value="Dijadwalkan">Dijadwalkan</option>
            <option value="Berangkat">Berangkat</option>
            <option value="Selesai">Selesai</option>
        </select>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('keberangkatan.index') }}" class="text-gray-600 hover:underline">Batal</a>
    </div>
</form>
@endsection
