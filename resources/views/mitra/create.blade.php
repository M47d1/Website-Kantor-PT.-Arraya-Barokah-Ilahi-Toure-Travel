@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Mitra</h1>

@if (session('success'))
    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('mitra.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <!-- Kode Mitra -->
    <div>
        <label class="block text-sm font-semibold mb-1">Kode Mitra</label>
        <input name="kode_mitra" value="{{ old('kode_mitra') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('kode_mitra') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Nama Depan -->
    <div>
        <label class="block text-sm font-semibold mb-1">Nama Depan</label>
        <input name="nama_depan" value="{{ old('nama_depan') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('nama_depan') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Nama Belakang -->
    <div>
        <label class="block text-sm font-semibold mb-1">Nama Belakang</label>
        <input name="nama_belakang" value="{{ old('nama_belakang') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('nama_belakang') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Sponsor -->
    <!-- Pilih Sponsor -->
    <div>
        <label class="block text-sm font-semibold mb-1">Pilih Sponsor</label>
        <select id="sponsorSelect" class="w-full border px-3 py-2 rounded">
            <option value="">-- Pilih Sponsor --</option>
            @foreach ($sponsors as $sponsor)
                <option 
                    value="{{ $sponsor->id }}"
                    data-nama="{{ $sponsor->nama_depan }} {{ $sponsor->nama_belakang }}"
                    data-kode="{{ $sponsor->kode_mitra }}"
                    {{ old('nama_sponsor') == $sponsor->nama_depan . ' ' . $sponsor->nama_belakang ? 'selected' : '' }}>
                    {{ $sponsor->nama_depan }} {{ $sponsor->nama_belakang }} ({{ $sponsor->kode_mitra }})
                </option>
            @endforeach
        </select>
    </div>

    <!-- Tambahkan dua hidden input berikut -->
    <input type="hidden" name="nama_sponsor" id="namaSponsor" value="{{ old('nama_sponsor') }}">
    <input type="hidden" name="kode_sponsor" id="kodeSponsor" value="{{ old('kode_sponsor') }}">



    <!-- NIK -->
    <div>
        <label class="block text-sm font-semibold mb-1">NIK</label>
        <input name="nik" value="{{ old('nik') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('nik') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Tempat Lahir -->
    <div>
        <label class="block text-sm font-semibold mb-1">Tempat Lahir</label>
        <input name="tempat_lahir" value="{{ old('tempat_lahir') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('tempat_lahir') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Tanggal Lahir -->
    <div>
        <label class="block text-sm font-semibold mb-1">Tanggal Lahir</label>
        <input name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" type="date" class="w-full border px-3 py-2 rounded" required>
        @error('tanggal_lahir') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Jenis Kelamin -->
    <div>
        <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border px-3 py-2 rounded" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-lakiL' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <!-- Alamat -->
    <div>
        <label class="block text-sm font-semibold mb-1">Alamat</label>
        <textarea name="alamat" class="w-full border px-3 py-2 rounded" required>{{ old('alamat') }}</textarea>
        @error('alamat') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- No HP -->
    <div>
        <label class="block text-sm font-semibold mb-1">No HP</label>
        <input name="no_hp" value="{{ old('no_hp') }}" type="text" class="w-full border px-3 py-2 rounded" required>
        @error('no_hp') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <!-- Foto -->
    <div>
        <label class="block text-sm font-semibold mb-1">Foto</label>
        <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
        @error('foto') <p class="text-sm text-red-500 mt-1">{{ $message }}</p> @enderror
    </div>

    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded">Simpan</button>
</form>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sponsorSelect = document.getElementById('sponsorSelect');
        const namaSponsorInput = document.getElementById('namaSponsor');
        const kodeSponsorInput = document.getElementById('kodeSponsor');

        sponsorSelect.addEventListener('change', function () {
            const selectedOption = sponsorSelect.options[sponsorSelect.selectedIndex];
            const nama = selectedOption.getAttribute('data-nama');
            const kode = selectedOption.getAttribute('data-kode');

            namaSponsorInput.value = nama || '';
            kodeSponsorInput.value = kode || '';
        });
    });
</script>
@endpush