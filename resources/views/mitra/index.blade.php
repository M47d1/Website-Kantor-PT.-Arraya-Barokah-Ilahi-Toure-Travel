<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Daftar Mitra</h2>
    </x-slot>

    <div class="py-6">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('mitra.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Mitra</a>
        <table class="mt-4 w-full border">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mitras as $mitra)
                    <tr>
                        <td>{{ $mitra->kode_mitra }}</td>
                        <td>{{ $mitra->nama_depan }} {{ $mitra->nama_belakang }}</td>
                        <td>{{ $mitra->no_hp }}</td>
                        <td>
                            <a href="{{ route('mitra.edit', $mitra) }}" class="text-blue-500">Edit</a> |
                            <form action="{{ route('mitra.destroy', $mitra) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin?')" class="text-red-500">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
