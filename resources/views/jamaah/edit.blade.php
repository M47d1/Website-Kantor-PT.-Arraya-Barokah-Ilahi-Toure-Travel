@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Jamaah</h1>


@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('jamaah.update', $jamaah->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    <!-- Nama Lengkap -->
    <div>
        <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
        <input name="nama_lengkap" value="{{ old('nama_lengkap', $jamaah->nama_lengkap) }}" type="text" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- NIK -->
    <div>
        <label class="block text-sm font-semibold mb-1">NIK</label>
        <input name="nik" value="{{ old('nik', $jamaah->nik) }}" type="text" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Foto KTP -->
    <div>
        <label class="block text-sm font-semibold mb-1">Foto KTP</label>
        @if ($jamaah->foto_ktp)
            <img src="{{ asset('storage/' . $jamaah->foto_ktp) }}" class="w-20 mb-2 rounded">
        @endif
        <input type="file" name="foto_ktp" class="w-full border px-3 py-2 rounded">
    </div>

    <!-- Tempat Lahir -->
    <div>
        <label class="block text-sm font-semibold mb-1">Tempat Lahir</label>
        <input name="tempat_lahir" value="{{ old('tempat_lahir', $jamaah->tempat_lahir) }}" type="text" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Tanggal Lahir -->
    <div>
        <label class="block text-sm font-semibold mb-1">Tanggal Lahir</label>
        <input name="tanggal_lahir" value="{{ old('tanggal_lahir', $jamaah->tanggal_lahir) }}" type="date" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Jenis Kelamin -->
    <div>
        <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border px-3 py-2 rounded" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ $jamaah->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $jamaah->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <!-- No Paspor -->
    <div>
        <label class="block text-sm font-semibold mb-1">No Paspor</label>
        <input name="no_paspor" value="{{ old('no_paspor', $jamaah->no_paspor) }}" type="text" class="w-full border px-3 py-2 rounded">
    </div>

    <!-- Foto Paspor -->
    <div>
        <label class="block text-sm font-semibold mb-1">Foto Paspor</label>
        @if ($jamaah->foto_paspor)
            <img src="{{ asset('storage/' . $jamaah->foto_paspor) }}" class="w-20 mb-2 rounded">
        @endif
        <input type="file" name="foto_paspor" class="w-full border px-3 py-2 rounded">
    </div>

    <!-- Alamat -->
    <div>
        <label class="block text-sm font-semibold mb-1">Alamat</label>
        <textarea name="alamat" class="w-full border px-3 py-2 rounded" required>{{ old('alamat', $jamaah->alamat) }}</textarea>
    </div>

    <!-- No HP -->
    <div>
        <label class="block text-sm font-semibold mb-1">No HP</label>
        <input name="no_hp" value="{{ old('no_hp', $jamaah->no_hp) }}" type="text" class="w-full border px-3 py-2 rounded" required>
    </div>

    <!-- Foto -->
    <div>
        <label class="block text-sm font-semibold mb-1">Foto</label>
        @if ($jamaah->foto)
            <img src="{{ asset('storage/' . $jamaah->foto) }}" class="w-20 mb-2 rounded">
        @endif
        <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
    </div>

    <!-- Foto KK -->
    <div>
        <label class="block text-sm font-semibold mb-1">Foto Kartu Keluarga</label>
        @if ($jamaah->foto_kk)
            <img src="{{ asset('storage/' . $jamaah->foto_kk) }}" class="w-20 mb-2 rounded">
        @endif
        <input type="file" name="foto_kk" class="w-full border px-3 py-2 rounded">
    </div>

    <!-- Foto Akta -->
    <div>
        <label class="block text-sm font-semibold mb-1">Foto Akta Kelahiran</label>
        @if ($jamaah->foto_akta_lahir)
            <img src="{{ asset('storage/' . $jamaah->foto_akta_lahir) }}" class="w-20 mb-2 rounded">
        @endif
        <input type="file" name="foto_akta_lahir" class="w-full border px-3 py-2 rounded">
    </div>

    <!-- Mitra -->
    <div>
        <label class="block text-sm font-semibold mb-1">Mitra</label>
        <select name="mitra_id" class="w-full border px-3 py-2 rounded">
            <option value="">-- Pilih Mitra --</option>
            @foreach($mitras as $mitra)
            <option value="{{ $mitra->id }}" {{ $jamaah->mitra_id == $mitra->id ? 'selected' : '' }}>
                {{ $mitra->nama_lengkap }}
            </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">Update</button>
</form>
@endsection
