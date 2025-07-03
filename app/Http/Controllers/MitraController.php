<?php
namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;

class MitraController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $mitras = Mitra::query()
            ->when($search, function ($query, $search) {
                $query->where('nama_depan', 'like', "%{$search}%")
                    ->orWhere('nama_belakang', 'like', "%{$search}%")
                    ->orWhere('kode_mitra', 'like', "%{$search}%")
                    ->orWhere('no_hp', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('mitra.index', compact('mitras', 'search'));
    }

    public function create()
    {
        $sponsors = Mitra::all(); // Ambil semua mitra untuk pilihan sponsor
        return view('mitra.create', compact('sponsors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_mitra' => 'required|unique:mitras',
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'nama_sponsor' => 'required',
            'kode_sponsor' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
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
            'kode_mitra' => ['required', Rule::unique('mitras')->ignore($mitra->id)],
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'nama_sponsor' => 'required',
            'kode_sponsor' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required',
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

