<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class JamaahController extends Controller
{
    public function index()
    {
        $jamaahs = Jamaah::with('mitra')->latest()->paginate(10);
        return view('jamaah.index', compact('jamaahs'));
    }

    public function create()
    {
        $mitras = Mitra::all();
        return view('jamaah.create', compact('mitras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap'   => 'required',
            'nik'            => 'required|unique:jamaah',
            'foto_ktp'       => 'nullable|image|max:2048',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'no_paspor'      => 'nullable|string',
            'foto_paspor'    => 'nullable|image|max:2048',
            'alamat'         => 'required',
            'no_hp'          => 'required',
            'foto'           => 'nullable|image|max:2048',
            'foto_kk'        => 'nullable|image|max:2048',
            'foto_akta_lahir'      => 'nullable|image|max:2048',
            'mitra_id'       => 'nullable|exists:mitras,id',
        ]);

        foreach (['foto', 'foto_ktp', 'foto_paspor', 'foto_kk', 'foto_akta_lahir'] as $field) {
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store("jamaah/$field", 'public');
            }
        }

        Jamaah::create($data);

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil ditambahkan');
    }

    public function edit(Jamaah $jamaah)
    {
        $mitras = Mitra::all();
        return view('jamaah.edit', compact('jamaah', 'mitras'));
    }

    public function update(Request $request, Jamaah $jamaah)
    {
        $data = $request->validate([
            'nama_lengkap'   => 'required',
            'nik' => 'required|unique:jamaah,nik,' . $jamaah->id,
            'foto_ktp'       => 'nullable|image|max:2048',
            'tempat_lahir'   => 'required',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'no_paspor'      => 'nullable|string',
            'foto_paspor'    => 'nullable|image|max:2048',
            'alamat'         => 'required',
            'no_hp'          => 'required',
            'foto'           => 'nullable|image|max:2048',
            'foto_kk'        => 'nullable|image|max:2048',
            'foto_akta_lahir'      => 'nullable|image|max:2048',
            'mitra_id'       => 'nullable|exists:mitras,id',
        ]);

        foreach (['foto', 'foto_ktp', 'foto_paspor', 'foto_kk', 'foto_akta_lahir'] as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama kalau ada
                if ($jamaah->$field) {
                    Storage::disk('public')->delete($jamaah->$field);
                }
                $data[$field] = $request->file($field)->store("jamaah/$field", 'public');
            }
        }

        $jamaah->update($data);

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil diupdate');
    }

    public function destroy(Jamaah $jamaah)
    {
        foreach (['foto', 'foto_ktp', 'foto_paspor', 'foto_kk', 'foto_akta_lahir'] as $field) {
            if ($jamaah->$field) {
                Storage::disk('public')->delete($jamaah->$field);
            }
        }

        $jamaah->delete();

        return redirect()->route('jamaah.index')->with('success', 'Data Jamaah berhasil dihapus');
    }
    public function print()
    {
        $jamaahs = Jamaah::with('mitra')->get(); // ambil semua data jamaah

        return view('jamaah.print', compact('jamaahs'));
    }

    public function printSingle(Jamaah $jamaah)
    {
        $pdf = Pdf::loadView('jamaah.single-pdf', compact('jamaah'))->setPaper('A4', 'portrait');
        return $pdf->stream('jamaah-' . $jamaah->nama_lengkap . '.pdf');
    }

}
