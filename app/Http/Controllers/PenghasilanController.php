<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

class PenghasilanController extends Controller
{
    public function index()
    {
        // Ambil mitra beserta jamaah dan mitra bawahannya
        $mitras = Mitra::with(['jamaah', 'mitraBawahan.jamaah'])->get();

        // Hitung penghasilan dan bonus sponsor
        $mitras = $mitras->map(function ($mitra) {
            // Hitung jamaah langsung
            $jumlahSendiri = $mitra->jamaah->count();

            // Hitung penghasilan sendiri (Gratis Umrah jika ≥ 10)
            $penghasilanSendiri = $jumlahSendiri < 10 ? $jumlahSendiri * 2000000 : 0;
            $bonusGratis = $jumlahSendiri >= 10 ? 'Gratis Umrah' : null;

            // Hitung jamaah dari mitra bawahan (anak mitra)
            $jumlahBawahan = $mitra->mitraBawahan->sum(function ($b) {
                return $b->jamaah->count();
            });

            // Sponsor dapat 500 ribu dari setiap jamaah bawahan
            $bonusSponsor = $jumlahBawahan * 500000;

            // Hitung total
            $total = $penghasilanSendiri + $bonusSponsor;

            return [
                'id' => $mitra->id,
                'nama' => $mitra->nama_lengkap,
                'jumlah_jamaah' => $jumlahSendiri,
                'jamaah_bawahan' => $jumlahBawahan,
                'bonus_sponsor' => $bonusSponsor,
                'total_penghasilan' => $bonusGratis ?: 'Rp ' . number_format($total, 0, ',', '.'),
            ];
        });

        return view('penghasilan.index', compact('mitras'));
    }
}
