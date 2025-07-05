<!DOCTYPE html>
<html>
<head>
    <title>Cetak Data Jamaah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</head>
<body class="p-6">
    <h1 class="text-xl font-bold mb-4">Laporan Data Jamaah</h1>

    <table class="w-full border text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-3 py-2">#</th>
                <th class="border px-3 py-2">Nama Lengkap</th>
                <th class="border px-3 py-2">NIK</th>
                <th class="border px-3 py-2">Mitra</th>
                <th class="border px-3 py-2">No HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jamaahs as $jamaah)
            <tr>
                <td class="border px-3 py-2">{{ $loop->iteration }}</td>
                <td class="border px-3 py-2">{{ $jamaah->nama_lengkap }}</td>
                <td class="border px-3 py-2">{{ $jamaah->nik }}</td>
                <td class="border px-3 py-2">
                    {{ $jamaah->mitra ? $jamaah->mitra->nama_lengkap : '-' }}
                </td>
                <td class="border px-3 py-2">{{ $jamaah->no_hp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
