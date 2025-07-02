<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah Mitra</h2>
    </x-slot>

    <div class="py-6">
        <form action="{{ route('mitra.store') }}" method="POST" enctype="multipart/form-data">
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-400 rounded p-3 mb-4">
                <ul class="list-disc ml-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
            <div class="mb-4">
                <label>Kode Mitra</label>
                <input type="text" name="kode_mitra" class="w-full border rounded px-2 py-1">
            </div>
            <div class="mb-4">
                <label>Nama Depan</label>
                <input type="text" name="nama_depan" class="w-full border rounded px-2 py-1">
            </div>
            <div class="mb-4">
                <label>Nama Belakang</label>
                <input type="text" name="nama_belakang" class="w-full border rounded px-2 py-1">
            </div>
            <div class="mb-4">
                <label>No HP</label>
                <input type="text" name="no_hp" class="w-full border rounded px-2 py-1">
            </div>
            <div class="mb-4">
                <label>Foto</label>
                <input type="file" name="foto">
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
