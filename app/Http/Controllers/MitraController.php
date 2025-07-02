<?php

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::all();
        return view('mitra.index', compact('mitras'));
    }

    public function create()
    {
        return view('mitra.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_mitra' => 'required|unique:mitras',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_mitra', 'public');
        }

        Mitra::create($data);

        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil ditambahkan');
    }

    public function edit(Mitra $mitra)
    {
        return view('mitra.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $data = $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'no_hp' => 'required',
            'foto' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_mitra', 'public');
        }

        $mitra->update($data);

        return redirect()->route('mitra.index')->with('success', 'Mitra berhasil diupdate');
    }

    public function destroy(Mitra $mitra)
    {
        $mitra->delete();
        return back()->with('success', 'Mitra berhasil dihapus');
    }
}

