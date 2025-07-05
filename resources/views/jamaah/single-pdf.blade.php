<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Jamaah</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 13px;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .field {
            margin-bottom: 10px;
        }
        .label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
        .photo {
            margin-top: 20px;
        }
        .photo img {
            height: 100px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Jamaah</h2>

        <div class="field">
            <span class="label">Nama Lengkap:</span> {{ $jamaah->nama_lengkap }}
        </div>

        <div class="field">
            <span class="label">NIK:</span> {{ $jamaah->nik }}
        </div>

        <div class="field">
            <span class="label">Tempat, Tgl Lahir:</span> {{ $jamaah->tempat_lahir }}, {{ \Carbon\Carbon::parse($jamaah->tanggal_lahir)->format('d-m-Y') }}
        </div>

        <div class="field">
            <span class="label">Jenis Kelamin:</span> {{ $jamaah->jenis_kelamin }}
        </div>

        <div class="field">
            <span class="label">Alamat:</span> {{ $jamaah->alamat }}
        </div>

        <div class="field">
            <span class="label">No HP:</span> {{ $jamaah->no_hp }}
        </div>

        <div class="field">
            <span class="label">No Paspor:</span> {{ $jamaah->no_paspor ?: '-' }}
        </div>

        <div class="field">
            <span class="label">Mitra:</span> {{ $jamaah->mitra->nama_lengkap ?? '-' }}
        </div>

        {{-- Foto-foto --}}
        <div class="photo">
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
                <div><strong>Foto Akta Kelahiran:</strong></div>
                <img src="{{ public_path('storage/' . $jamaah->foto_akta_lahir) }}" alt="Foto Akta">
            @endif
        </div>
    </div>
</body>
</html>
