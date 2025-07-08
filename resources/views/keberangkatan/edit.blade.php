@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6 text-yellow-600">✏️ Edit Pemberangkatan</h1>

@if($errors->any())
    <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('keberangkatan.update', $keberangkatan->id) }}" method="POST" class="bg-white p-6 rounded shadow w-full max-w-lg">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block font-semibold mb-1">Tanggal Berangkat</label>
        <input type="date" name="tanggal_berangkat" value="{{ \Carbon\Carbon::parse($keberangkatan->tanggal_berangkat)->format('Y-m-d') }}" class="w-full border rounded px-3 py-2" required>
    </div>


    <div class="mb-4">
        <label class="block font-semibold mb-1">Nama Paket</label>
        <input type="text" name="nama_paket" value="{{ $keberangkatan->nama_paket }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-4">
        <label class="block font-semibold mb-1">Gelombang</label>
        <input type="text" name="gelombang" value="{{ $keberangkatan->gelombang }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="mb-6">
        <label class="block font-semibold mb-1">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2" required>
            <option value="Dijadwalkan" {{ $keberangkatan->status == 'Dijadwalkan' ? 'selected' : '' }}>Dijadwalkan</option>
            <option value="Berangkat" {{ $keberangkatan->status == 'Berangkat' ? 'selected' : '' }}>Berangkat</option>
            <option value="Selesai" {{ $keberangkatan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('keberangkatan.index') }}" class="text-gray-600 hover:underline">Batal</a>
    </div>
</form>
@endsection
