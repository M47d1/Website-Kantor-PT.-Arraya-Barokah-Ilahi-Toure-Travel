<?php

namespace App\Http\Controllers;

use App\Models\Mitra;

class PenghasilanController extends Controller
{
    public function index()
    {
        $mitras = Mitra::with(['jamaah', 'sponsor.sponsor'])->get();

        $penghasilan = [];

        foreach ($mitras as $mitra) {
            $jumlahJamaah = $mitra->jamaah->count();

            // ✅ 1. Penghasilan pribadi (Rp 1.000.000 per jamaah langsung)
            $penghasilan[$mitra->id]['nama'] = $mitra->nama_lengkap;
            $penghasilan[$mitra->id]['jumlah_jamaah'] = $jumlahJamaah;
            $penghasilan[$mitra->id]['penghasilan'] = $jumlahJamaah * 1000000;
            $penghasilan[$mitra->id]['bonus_sponsor'] = $penghasilan[$mitra->id]['bonus_sponsor'] ?? 0;

            // ✅ 2. Sponsor langsung (500.000 per jamaah)
            if ($mitra->sponsor) {
                $penghasilan[$mitra->sponsor->id]['nama'] = $mitra->sponsor->nama_lengkap;
                $penghasilan[$mitra->sponsor->id]['jumlah_jamaah'] = $penghasilan[$mitra->sponsor->id]['jumlah_jamaah'] ?? 0;
                $penghasilan[$mitra->sponsor->id]['penghasilan'] = $penghasilan[$mitra->sponsor->id]['penghasilan'] ?? 0;
                $penghasilan[$mitra->sponsor->id]['bonus_sponsor'] = ($penghasilan[$mitra->sponsor->id]['bonus_sponsor'] ?? 0) + ($jumlahJamaah * 500000);
            }

            // ✅ 3. Sponsor level 2 (250.000 per jamaah)
            if ($mitra->sponsor && $mitra->sponsor->sponsor) {
                $sponsor2 = $mitra->sponsor->sponsor;
                $penghasilan[$sponsor2->id]['nama'] = $sponsor2->nama_lengkap;
                $penghasilan[$sponsor2->id]['jumlah_jamaah'] = $penghasilan[$sponsor2->id]['jumlah_jamaah'] ?? 0;
                $penghasilan[$sponsor2->id]['penghasilan'] = $penghasilan[$sponsor2->id]['penghasilan'] ?? 0;
                $penghasilan[$sponsor2->id]['bonus_sponsor'] = ($penghasilan[$sponsor2->id]['bonus_sponsor'] ?? 0) + ($jumlahJamaah * 250000);
            }
        }

        // Hitung total
        $mitras = collect($penghasilan)->map(function ($item) {
            $total = ($item['penghasilan'] ?? 0) + ($item['bonus_sponsor'] ?? 0);
            $item['total_penghasilan'] = 'Rp ' . number_format($total, 0, ',', '.');
            return $item;
        });

        return view('penghasilan.index', ['penghasilan' => $mitras]);

    }

}
