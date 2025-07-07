<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\Jamaah;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Mitra & Jamaah
        $totalMitra = Mitra::count();
        $totalJamaah = Jamaah::count();

        // Hitung total penghasilan berdasarkan jumlah Jamaah per mitra
        $mitras = Mitra::withCount('jamaah')->get();
        $totalPenghasilan = 0;

        foreach ($mitras as $mitra) {
            $jumlah = $mitra->jamaah_count;

            if ($jumlah < 10) {
                $totalPenghasilan += $jumlah * 2000000;
            }
            // Jika >=10 maka mitra mendapatkan gratis Umrah
        }

        // 🔢 Statistik Jamaah per Bulan (12 bulan terakhir)
        $bulanLabels = [];
        $jumlahJamaahPerBulan = [];

        for ($i = 0; $i < 12; $i++) {
            $bulan = Carbon::now()->subMonths(11 - $i)->format('Y-m');
            $label = Carbon::now()->subMonths(11 - $i)->translatedFormat('M Y');
            $count = Jamaah::whereDate('created_at', 'like', "$bulan%")->count();

            $bulanLabels[] = $label;
            $jumlahJamaahPerBulan[] = $count;
        }

        // ⚖️ Statistik Gender
        $totalLaki = Jamaah::where('jenis_kelamin', 'L')->count();
        $totalPerempuan = Jamaah::where('jenis_kelamin', 'P')->count();

        // Tambahkan jika ada totalKeberangkatan (sementara 0)
        $totalKeberangkatan = 0;

        return view('dashboard.index', compact(
            'totalMitra',
            'totalJamaah',
            'totalKeberangkatan',
            'totalPenghasilan',
            'totalLaki',
            'totalPerempuan',
            'bulanLabels',
            'jumlahJamaahPerBulan'
        ));        
    }
}
