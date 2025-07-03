@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Mitra</h1>

<form action="{{ route('mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')

    @foreach ([
        'kode_mitra' => 'Kode Mitra',
        'nama_depan' => 'Nama Depan',
        'nama_belakang' => 'Nama Belakang',
        'nama_sponsor' => 'Nama Sponsor',
        'kode_sponsor' => 'Kode Sponsor',
        'nik' => 'NIK',
        'tempat_lahir' => 'Tempat Lahir',
        'tanggal_lahir' => 'Tanggal Lahir',
        'alamat' => 'Alamat',
        'no_hp' => 'No HP'
    ] as $field => $label)
        <div>
            <label class="block text-sm font-semibold mb-1">{{ $label }}</label>
            <input name="{{ $field }}" value="{{ old($field, $mitra->$field) }}" type="{{ $field == 'tanggal_lahir' ? 'date' : 'text' }}"
                class="w-full border px-3 py-2 rounded" required>
        </div>
    @endforeach

    <div>
        <label class="block text-sm font-semibold mb-1">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border px-3 py-2 rounded" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki" {{ $mitra->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $mitra->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-semibold mb-1">Foto</label>
        @if ($mitra->foto)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $mitra->foto) }}" class="w-16 h-16 rounded-full">
            </div>
        @endif
        <input type="file" name="foto" class="w-full border px-3 py-2 rounded">
    </div>

    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
</form>
@endsection
