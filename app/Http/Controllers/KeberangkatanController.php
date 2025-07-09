<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use App\Models\Keberangkatan;
use Illuminate\Http\Request;

class KeberangkatanController extends Controller
{
    public function index()
    {
        $keberangkatans = Keberangkatan::all();
        return view('keberangkatan.index', compact('keberangkatans'));
    }

    public function create()
    {
        return view('keberangkatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_berangkat' => 'required|date',
            'nama_paket' => 'required|string',
            'gelombang' => 'required|string',
            'status' => 'required|string',
        ]);

        Keberangkatan::create($request->all());
        return redirect()->route('keberangkatan.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Keberangkatan $keberangkatan)
    {
        return view('keberangkatan.edit', compact('keberangkatan'));
    }

    public function update(Request $request, Keberangkatan $keberangkatan)
    {
        $request->validate([
            'tanggal_berangkat' => 'required|date',
            'nama_paket' => 'required|string',
            'gelombang' => 'required|string',
            'status' => 'required|string',
        ]);

        $keberangkatan->update($request->all());
        return redirect()->route('keberangkatan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Keberangkatan $keberangkatan)
    {
        $keberangkatan->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function aturJamaah($id)
    {
        $keberangkatan = Keberangkatan::findOrFail($id);
        $jamaah = Jamaah::all(); // kamu bisa filter jika perlu
        $terpilih = $keberangkatan->jamaah()->pluck('jamaah_id')->toArray();

        return view('keberangkatan.atur-jamaah', compact('keberangkatan', 'jamaah', 'terpilih'));
    }

    public function simpanJamaah(Request $request, $id)
    {
        $keberangkatan = Keberangkatan::findOrFail($id);
        $keberangkatan->jamaah()->sync($request->jamaah_ids);

        return redirect()->route('keberangkatan.index')->with('success', 'Jamaah berhasil ditetapkan.');
    }

    

}
