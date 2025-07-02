<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\Jamaah;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMitra = Mitra::count();
        $totalJamaah = Jamaah::count();

        return view('dashboard.index', compact('totalMitra', 'totalJamaah'));
    }
}
