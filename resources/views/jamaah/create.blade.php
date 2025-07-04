@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Jamaah</h1>

@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('jamaah.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    {{-- Nama Lengkap --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
        <input name="nama_lengkap" value="{{ old('nama_lengkap') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('nama_lengkap') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- NIK --}}
    <div>
        <label class="block text-sm font-semibold mb-1">NIK</label>
        <input name="nik" value="{{ old('nik') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('nik') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Foto KTP --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Foto KTP</label>
        <input type="file" name="foto_ktp" class="w-full border px-3 py-2 rounded">
        @error('foto_ktp') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Tempat Lahir --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Tempat Lahir</label>
        <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('tempat_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Tanggal Lahir --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Tanggal Lahir</label>
        <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date" class="w-full border px-3 py-2 rounded" required>
        @error('tanggal_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Jenis Kelamin --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border px-3 py-2 rounded" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('jenis_kelamin') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- No Paspor --}}
    <div>
        <label class="block text-sm font-semibold mb-1">No Paspor (Opsional)</label>
        <input name="no_paspor" value="{{ old('no_paspor') }}" type="text" class="w-full border px-3 py-2 rounded">
        @error('no_paspor') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Foto Paspor --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Foto Paspor</label>
        <input type="file" name="foto_paspor" class="w-full border px-3 py-2 rounded">
        @error('foto_paspor') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Alamat --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Alamat</label>
        <textarea name="alamat" class="w-full border px-3 py-2 rounded" required>{{ old('alamat') }}</textarea>
        @error('alamat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- No HP --}}
    <div>
        <label class="block text-sm font-semibold mb-1">No HP</label>
        <input name="no_hp" value="{{ old('no_hp') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('no_hp') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Foto --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Foto</label>
        <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
        @error('foto') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Foto KK --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Foto Kartu Keluarga</label>
        <input type="file" name="foto_kk" class="w-full border px-3 py-2 rounded">
        @error('foto_kk') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Foto Akta --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Foto Akta Kelahiran</label>
        <input type="file" name="foto_akta_lahir" class="w-full border px-3 py-2 rounded">
        @error('foto_akta_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    {{-- Mitra --}}
    <div>
        <label class="block text-sm font-semibold mb-1">Mitra</label>
        <select name="mitra_id" class="w-full border px-3 py-2 rounded">
            <option value="">-- Pilih Mitra --</option>
            @foreach($mitras as $mitra)
            <option value="{{ $mitra->id }}" {{ old('mitra_id') == $mitra->id ? 'selected' : '' }}>
                {{ $mitra->nama_lengkap }}
            </option>
            @endforeach
        </select>
        @error('mitra_id') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Simpan</button>
</form>
@endsection
