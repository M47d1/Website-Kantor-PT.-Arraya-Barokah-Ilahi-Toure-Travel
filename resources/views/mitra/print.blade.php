<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran Mitra</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td, th {
            vertical-align: top;
            padding: 2px 5px;
        }

        .section-title {
            font-weight: bold;
            text-align: center;
            text-decoration: underline;
            margin: 20px 0 10px;
        }

        .foto {
            width: 4cm;
            height: 6cm;
            object-fit: cover;
            border: 1px solid #000;
        }


        ul {
            margin-top: 8px;
            padding-left: 20px;
        }
        p {
            text-align: justify;
            text-indent: 1.2em; /* atau 2em sesuai selera */
        }


        .ttd {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="content">
        <h3 style="text-align: center;">FORMULIR PENDAFTARAN MITRA</h3>
        <p style="text-align: center;">Nomor: {{ $mitra->kode_mitra }}</p>

        <div class="section-title">DATA DIRI MITRA</div>

        <table>
            <tr>
                <td style="width: 65%;">
                    <table>
                        <tr><td style="width: 30%;">Nama Lengkap</td><td style="width: 2%;">:</td><td>{{ $mitra->nama_lengkap }}</td></tr>
                        <tr><td>No KTP</td><td>:</td><td>{{ $mitra->nik }}</td></tr>
                        <tr><td>Tempat, Tanggal Lahir</td><td>:</td><td>{{ $mitra->tempat_lahir }}, {{ $mitra->tanggal_lahir }}</td></tr>
                        <tr><td>Jenis Kelamin</td><td>:</td><td>{{ $mitra->jenis_kelamin }}</td></tr>
                        <tr><td>Status Perkawinan</td><td>:</td><td>{{ $mitra->status_perkawinan }}</td></tr>
                        <tr><td>Alamat</td><td>:</td><td>{{ $mitra->alamat }}</td></tr>
                        <tr><td>No HP/WA</td><td>:</td><td>{{ $mitra->no_hp }}</td></tr>
                        <tr><td>Pekerjaan</td><td>:</td><td>{{ $mitra->pekerjaan }}</td></tr>
                        <tr><td>Nama Sponsor</td><td>:</td><td>{{ $mitra->nama_sponsor }}</td></tr>
                    </table>
                </td>
                <td style="width: 35%; text-align: center;">
                    @if ($mitra->foto)
                        <img src="{{ public_path('storage/' . $mitra->foto) }}" class="foto">
                    @else
                        <div class="foto"></div>
                    @endif
                </td>
            </tr>
        </table>

        <p style="margin-top: 20px;">
            Dengan ini menyatakan bahwa <strong>{{ $mitra->nama_lengkap }}</strong> bersedia berkolaborasi menjadi Mitra Sasaran dengan:
        </p>

        <table>
            <tr><td style="width: 30%;">Nama Travel</td><td style="width: 2%;">:</td><td>PT. Arraya Barokah Ilahi Tour & Travel</td></tr>
            <tr><td>No Induk Berusaha</td><td>:</td><td>2905230066947</td></tr>
            <tr><td>Nama Direktur</td><td>:</td><td>H. Ahmad Irham</td></tr>
            <tr><td>Alamat</td><td>:</td><td>Jl. Reak Tanak Awu – Pengembur, Pujut, Kab. Lombok Tengah, Prov. NTB</td></tr>
        </table>

        <h4 class="section-title">RUANG LINGKUP KERJA SAMA</h4>
        <ul>
            <li>Memberikan informasi kepada masyarakat terkait program Umrah dan Haji dari Travel.</li>
            <li>Membantu dalam edukasi, pengumpulan dokumen, dan komunikasi dengan calon jamaah.</li>
            <li>Tidak melakukan transaksi pembayaran langsung dari jamaah ke pribadi/mitra.</li>
            <li>Mengarahkan seluruh pembayaran hanya ke rekening resmi travel.</li>
        </ul>

        <h4 class="section-title">LARANGAN & SANKSI</h4>
        <p>Saya memahami dan menyetujui bahwa:</p>
        <ul>
            <li>Tidak diperbolehkan mengarahkan calon jamaah ke travel/penyelenggara lain tanpa izin tertulis dari pihak Travel.</li>
            <li>Tidak diperbolehkan menerima uang muka, pembayaran, atau dana apapun dari calon jamaah atas nama pribadi atau kelompok.</li>
            <li>Jika terbukti melanggar, saya bersedia dikenakan sanksi berupa <strong>denda administratif sebesar Rp 5.000.000,- (lima juta rupiah)</strong> per pelanggaran.</li>
            <li>Apabila terjadi tindakan yang merugikan jamaah atau pihak travel, saya bersedia diproses sesuai hukum yang berlaku.</li>
        </ul>
    </div>
    <div class="content" style="page-break-before: always;">
        <h4 class="section-title">FORCE MAJEURE</h4>
        <p>
            Apabila terjadi keadaan luar biasa (force majeure) seperti bencana alam, wabah penyakit, kebijakan pemerintah, atau hal lain yang berada di luar kendali para pihak,
            maka kedua belah pihak dibebaskan dari tuntutan dan berkewajiban mencari solusi bersama.
        </p>

        <p style="margin-top: 20px;">
            Demikian formulir ini saya isi dengan sebenar-benarnya dan bersedia mematuhi segala ketentuan yang berlaku dalam kerja sama ini.
        </p>

        <table style="width: 100%; margin-top: 30px;">
            <tr>
                <td style="width: 50%;"></td>
                <td style="text-align: center;">
                    Tanak Awu, {{ \Carbon\Carbon::parse($mitra->created_at)->translatedFormat('d F Y') }}<br>
                    Yang membuat pernyataan,<br><br>
                    <h1></h1>
                    <h1></h1>
                    <strong>{{ $mitra->nama_lengkap }}</strong><br>
                    
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
