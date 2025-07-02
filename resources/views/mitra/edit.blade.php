<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit Mitra</h2>
    </x-slot>

    <div class="py-6">
        {{-- Validasi error --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-400 rounded p-3 mb-4">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('mitra.update', $mitra) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label>Nama Depan</label>
                <input type="text" name="nama_depan" value="{{ old('nama_depan', $mitra->nama_depan) }}" class="w-full border rounded px-2 py-1">
            </div>

            <div class="mb-4">
                <label>Nama Belakang</label>
                <input type="text" name="nama_belakang" value="{{ old('nama_belakang', $mitra->nama_belakang) }}" class="w-full border rounded px-2 py-1">
            </div>

            <div class="mb-4">
                <label>No HP</label>
                <input type="text" name="no_hp" value="{{ old('no_hp', $mitra->no_hp) }}" class="w-full border rounded px-2 py-1">
            </div>

            <div class="mb-4">
                <label>Foto Baru (jika ingin ganti)</label><br>
                @if ($mitra->foto)
                    <img src="{{ asset('storage/' . $mitra->foto) }}" width="100" class="mb-2"><br>
                @endif
                <input type="file" name="foto">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
