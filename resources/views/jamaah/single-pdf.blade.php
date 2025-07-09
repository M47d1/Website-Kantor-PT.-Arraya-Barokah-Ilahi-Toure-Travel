<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jamaah</title>
    <style>
        @page {
            size: A4;
            margin: 0mm;
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            background-image: url("{{ public_path('asset/image/surat.png') }}");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin: 0;
            padding: 0;
        }

        .content {
            position: relative;
            z-index: 10;
            padding: 150px 40px 40px 40px;
            font-size: 12px;
        }

        .title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 4px 6px;
            vertical-align: top;
        }

        .label {
            width: 180px;
            font-weight: bold;
        }

        .foto {
            margin-top: 20px;
        }

        .foto img {
            height: 100px;
            margin-right: 10px;
            border: 1px solid #444;
        }

        .section {
            margin-top: 20px;
        }

        .subtitle {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 6px;
        }
    </style>
</head>
<body>
<div class="content">
    <div class="title">DATA JAMAAH</div>

    <table>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>: {{ $jamaah->nama_lengkap }}</td>
        </tr>
        <tr>
            <td class="label">NIK</td>
            <td>: {{ $jamaah->nik }}</td>
        </tr>
        <tr>
            <td class="label">Tempat, Tanggal Lahir</td>
            <td>: {{ $jamaah->tempat_lahir }}, {{ \Carbon\Carbon::parse($jamaah->tanggal_lahir)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="label">Jenis Kelamin</td>
            <td>: {{ $jamaah->jenis_kelamin }}</td>
        </tr>
        <tr>
            <td class="label">Alamat</td>
            <td>: {{ $jamaah->alamat }}</td>
        </tr>
        <tr>
            <td class="label">No HP</td>
            <td>: {{ $jamaah->no_hp }}</td>
        </tr>
        <tr>
            <td class="label">No Paspor</td>
            <td>: {{ $jamaah->no_paspor ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Buat Paspor</td>
            <td>: {{ $jamaah->tanggal_buat_paspor ? \Carbon\Carbon::parse($jamaah->tanggal_buat_paspor)->format('d-m-Y') : '-' }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Habis Paspor</td>
            <td>: {{ $jamaah->tanggal_habis_paspor ? \Carbon\Carbon::parse($jamaah->tanggal_habis_paspor)->format('d-m-Y') : '-' }}</td>
        </tr>
        <tr>
            <td class="label">Lokasi Buat Paspor</td>
            <td>: {{ $jamaah->lokasi_buat_paspor ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Mitra</td>
            <td>: {{ $jamaah->mitra->nama_lengkap ?? '-' }}</td>
        </tr>
    </table>

    <div class="section">
        <div class="subtitle">Lampiran Foto</div>
        <div class="foto">
            @if ($jamaah->foto)
                <div><strong>Foto Jamaah:</strong></div>
                <img src="{{ public_path('storage/' . $jamaah->foto) }}" alt="Foto Jamaah">
            @endif

            @if ($jamaah->foto_ktp)
                <div><strong>Foto KTP:</strong></div>
                <img src="{{ public_path('storage/' . $jamaah->foto_ktp) }}" alt="Foto KTP">
            @endif

            @if ($jamaah->foto_kk)
                <div><strong>Foto KK:</strong></div>
                <img src="{{ public_path('storage/' . $jamaah->foto_kk) }}" alt="Foto KK">
            @endif

            @if ($jamaah->foto_paspor)
                <div><strong>Foto Paspor:</strong></div>
                <img src="{{ public_path('storage/' . $jamaah->foto_paspor) }}" alt="Foto Paspor">
            @endif

            @if ($jamaah->foto_akta_lahir)
                <div><strong>Foto Akta Lahir:</strong></div>
                <img src="{{ public_path('storage/' . $jamaah->foto_akta_lahir) }}" alt="Foto Akta">
            @endif
        </div>
    </div>
</div>
</body>
</html>
