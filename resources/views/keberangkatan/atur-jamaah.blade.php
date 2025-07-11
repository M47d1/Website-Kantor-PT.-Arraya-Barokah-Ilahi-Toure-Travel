@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold text-green-700 mb-6">
    🧳 Pilih Jamaah untuk Keberangkatan: {{ $keberangkatan->nama_paket }} - {{ $keberangkatan->gelombang }}
</h1>

@if (session('success'))
    <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

<form method="POST" action="{{ route('keberangkatan.simpan-jamaah', $keberangkatan->id) }}">
    @csrf

    <div class="overflow-x-auto bg-white shadow rounded-lg mb-6">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-green-100 text-gray-700">
                <tr>
                    <th class="px-4 py-3">Pilih</th>
                    <th class="px-4 py-3">Full Name</th>
                    <th class="px-4 py-3">Gender</th>
                    <th class="px-4 py-3">No Paspor</th>
                    <th class="px-4 py-3">Place of Birth</th>
                    <th class="px-4 py-3">Date of Birth</th>
                    <th class="px-4 py-3">Date of Issu</th>
                    <th class="px-4 py-3">Date of Expiry</th>
                    <th class="px-4 py-3">Issuing Office</th>
                    <th class="px-4 py-3">NIK</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jamaah as $j)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">
                        <input type="checkbox" name="jamaah_ids[]" value="{{ $j->id }}"
                            {{ in_array($j->id, $terpilih) ? 'checked' : '' }}
                            class="form-checkbox text-green-600">
                    </td>
                    <td class="px-4 py-2">{{ $j->nama_lengkap }}</td>
                    <td class="px-4 py-2">{{ $j->jenis_kelamin }}</td>
                    <td class="px-4 py-2">{{ $j->no_paspor ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $j->tempat_lahir }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($j->tanggal_lahir)->format('d-M-Y') }}</td>
                    <td class="px-4 py-2">{{ $j->tanggal_buat_paspor ? \Carbon\Carbon::parse($j->tanggal_buat_paspor)->format('d-M-Y') : '-' }}</td>
                    <td class="px-4 py-2">{{ $j->tanggal_habis_paspor ? \Carbon\Carbon::parse($j->tanggal_habis_paspor)->format('d-M-Y') : '-' }}</td>
                    <td class="px-4 py-2">{{ $j->lokasi_buat_paspor ?? '-' }}</td>
                    <td class="px-4 py-2">{{ $j->nik }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center text-gray-500 py-4">Tidak ada data Jamaah.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            💾 Simpan Jamaah
        </button>
    </div>
</form>
@endsection
