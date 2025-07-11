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

            $penghasilan[$mitra->id]['id'] = $mitra->id;
            $penghasilan[$mitra->id]['kode_mitra'] = $mitra->kode_mitra;
            $penghasilan[$mitra->id]['nama'] = $mitra->nama_lengkap;
            $penghasilan[$mitra->id]['diambil'] = $mitra->diambil;

            if ($mitra->diambil) {
                $penghasilan[$mitra->id]['jumlah_jamaah'] = 0;
                $penghasilan[$mitra->id]['penghasilan'] = 0;
                $penghasilan[$mitra->id]['bonus_sponsor'] = 0;
            } else {
                $penghasilan[$mitra->id]['jumlah_jamaah'] = $jumlahJamaah;
                $penghasilan[$mitra->id]['penghasilan'] = $jumlahJamaah * 1000000;
                $penghasilan[$mitra->id]['bonus_sponsor'] = $penghasilan[$mitra->id]['bonus_sponsor'] ?? 0;
            }

            // Sponsor langsung
            if ($mitra->sponsor) {
                $sponsor = $mitra->sponsor;

                if (!isset($penghasilan[$sponsor->id])) {
                    $penghasilan[$sponsor->id] = [
                        'id' => $sponsor->id,
                        'kode_mitra' => $sponsor->kode_mitra,
                        'nama' => $sponsor->nama_lengkap,
                        'diambil' => $sponsor->diambil,
                        'jumlah_jamaah' => 0,
                        'penghasilan' => 0,
                        'bonus_sponsor' => 0,
                    ];
                }

                if (!$sponsor->diambil) {
                    $penghasilan[$sponsor->id]['bonus_sponsor'] += $jumlahJamaah * 500000;
                }
            }

            // Sponsor level 2
            if ($mitra->sponsor && $mitra->sponsor->sponsor) {
                $sponsor2 = $mitra->sponsor->sponsor;

                if (!isset($penghasilan[$sponsor2->id])) {
                    $penghasilan[$sponsor2->id] = [
                        'id' => $sponsor2->id,
                        'kode_mitra' => $sponsor2->kode_mitra,
                        'nama' => $sponsor2->nama_lengkap,
                        'diambil' => $sponsor2->diambil,
                        'jumlah_jamaah' => 0,
                        'penghasilan' => 0,
                        'bonus_sponsor' => 0,
                    ];
                }

                if (!$sponsor2->diambil) {
                    $penghasilan[$sponsor2->id]['bonus_sponsor'] += $jumlahJamaah * 250000;
                }
            }
        }

        // Hitung total penghasilan
        $mitras = collect($penghasilan)->map(function ($item) {
            $total = ($item['penghasilan'] ?? 0) + ($item['bonus_sponsor'] ?? 0);
            $item['total_penghasilan'] = 'Rp ' . number_format($total, 0, ',', '.');
            return $item;
        });

        return view('penghasilan.index', ['penghasilan' => $mitras]);
    }

    public function ambil(Request $request)
    {
        $mitraIds = $request->input('penghasilan_diambil', []);

        if (count($mitraIds)) {
            DB::table('mitras')
                ->whereIn('kode_mitra', $mitraIds)
                ->update(['diambil' => true]);
        }

        return redirect()->route('penghasilan.index')->with('success', 'Status pengambilan penghasilan berhasil diperbarui.');
    }
}
