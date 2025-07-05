<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\Jamaah;
use App\Models\penghasilan;

class DashboardController extends Controller
{
    public function index()
    {
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
            // jika >=10 -> tidak dihitung, dapat Gratis Umrah
        }

        return view('dashboard.index', compact('totalMitra', 'totalJamaah', 'totalPenghasilan'));
    }

}
