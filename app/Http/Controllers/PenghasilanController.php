<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenghasilanController extends Controller
{
    public function index()
    {
        $mitras = Mitra::with(['jamaah', 'sponsor.sponsor'])->get();

        $penghasilan = [];

        foreach ($mitras as $mitra) {
            $jumlahJamaah = $mitra->jamaah->count();

            // Data Mitra Utama
            $penghasilan[$mitra->id]['kode_mitra'] = $mitra->kode_mitra;
            $penghasilan[$mitra->id]['nama'] = $mitra->nama_lengkap;
            $penghasilan[$mitra->id]['diambil'] = $mitra->diambil;
            $penghasilan[$mitra->id]['jumlah_jamaah'] = $jumlahJamaah;
            $penghasilan[$mitra->id]['penghasilan'] = $jumlahJamaah * 1000000;
            $penghasilan[$mitra->id]['bonus_sponsor'] = $penghasilan[$mitra->id]['bonus_sponsor'] ?? 0;

            // Sponsor langsung
            if ($mitra->sponsor) {
                $sponsor = $mitra->sponsor;
                $penghasilan[$sponsor->id]['kode_mitra'] = $sponsor->kode_mitra;
                $penghasilan[$sponsor->id]['nama'] = $sponsor->nama_lengkap;
                $penghasilan[$sponsor->id]['diambil'] = $sponsor->diambil;
                $penghasilan[$sponsor->id]['jumlah_jamaah'] = $penghasilan[$sponsor->id]['jumlah_jamaah'] ?? 0;
                $penghasilan[$sponsor->id]['penghasilan'] = $penghasilan[$sponsor->id]['penghasilan'] ?? 0;
                $penghasilan[$sponsor->id]['bonus_sponsor'] = ($penghasilan[$sponsor->id]['bonus_sponsor'] ?? 0) + ($jumlahJamaah * 500000);
            }

            // Sponsor level 2
            if ($mitra->sponsor && $mitra->sponsor->sponsor) {
                $sponsor2 = $mitra->sponsor->sponsor;
                $penghasilan[$sponsor2->id]['kode_mitra'] = $sponsor2->kode_mitra;
                $penghasilan[$sponsor2->id]['nama'] = $sponsor2->nama_lengkap;
                $penghasilan[$sponsor2->id]['diambil'] = $sponsor2->diambil;
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

    public function ambil(Request $request)
    {
        $kodeMitras = $request->input('penghasilan_diambil', []);

        if (count($kodeMitras)) {
            DB::table('mitras')
                ->whereIn('kode_mitra', $kodeMitras)
                ->update(['diambil' => true]);
        }

        return redirect()->route('penghasilan.index')->with('success', 'Status pengambilan penghasilan berhasil diperbarui.');
    }
}
