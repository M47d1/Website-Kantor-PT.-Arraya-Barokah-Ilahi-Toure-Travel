<!DOCTYPE html>
<html>
<head>
    <title>Data Jamaah</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 5px; text-align: left; }
        th { background-color: #f0f0f0; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Jamaah</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Mitra</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jamaah as $j)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $j->nama_lengkap }}</td>
                <td>{{ $j->nik }}</td>
                <td>{{ $j->tempat_lahir }}, {{ $j->tanggal_lahir }}</td>
                <td>{{ $j->jenis_kelamin }}</td>
                <td>{{ $j->no_hp }}</td>
                <td>{{ $j->mitra->nama_lengkap ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
