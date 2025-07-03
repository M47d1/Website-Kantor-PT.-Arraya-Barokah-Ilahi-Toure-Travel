<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label>Kode Mitra</label>
        <input type="text" name="kode_mitra" value="{{ old('kode_mitra', $mitra->kode_mitra ?? '') }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label>Nama Sponsor</label>
        <input type="text" name="nama_sponsor" value="{{ old('nama_sponsor', $mitra->nama_sponsor ?? '') }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>Nama Depan</label>
        <input type="text" name="nama_depan" value="{{ old('nama_depan', $mitra->nama_depan ?? '') }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label>Nama Belakang</label>
        <input type="text" name="nama_belakang" value="{{ old('nama_belakang', $mitra->nama_belakang ?? '') }}" class="w-full border p-2 rounded" required>
    </div>

    <div>
        <label>Kode Sponsor</label>
        <input type="text" name="kode_sponsor" value="{{ old('kode_sponsor', $mitra->kode_sponsor ?? '') }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>NIK</label>
        <input type="text" name="nik" value="{{ old('nik', $mitra->nik ?? '') }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $mitra->tempat_lahir ?? '') }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mitra->tanggal_lahir ?? '') }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="w-full border p-2 rounded">
            <option value="Laki-laki" {{ (old('jenis_kelamin', $mitra->jenis_kelamin ?? '') == 'Laki-laki') ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ (old('jenis_kelamin', $mitra->jenis_kelamin ?? '') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
        </select>
    </div>

    <div>
        <label>Alamat</label>
        <textarea name="alamat" class="w-full border p-2 rounded">{{ old('alamat', $mitra->alamat ?? '') }}</textarea>
    </div>

    <div>
        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $mitra->no_hp ?? '') }}" class="w-full border p-2 rounded">
    </div>

    <div>
        <label>Foto</label>
        <input type="file" name="foto" class="w-full border p-2 rounded">
        @if (!empty($mitra->foto))
            <img src="{{ asset('storage/' . $mitra->foto) }}" class="h-20 mt-2 rounded">
        @endif
    </div>
</div>

<div>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">{{ $submit }}</button>
    <a href="{{ route('mitra.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
</div>
