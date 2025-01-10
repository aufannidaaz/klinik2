<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasiens'] = \App\Models\Pasien::latest()->paginate(100);
        return view('pasien_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien',
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        if ($request->hasFile('foto')) {
            $requestData['foto'] = $request->file('foto')->store('public/foto_pasien');
        }
        $pasien = new \App\Models\Pasien;
        $pasien->fill($requestData);
        $pasien->foto = $request->file('foto')->store('public');
        $pasien->save();
        flash('Data pasien berhasil disimpan..')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien_edit', compact('pasien')); // Sesuaikan nama folder dan file Blade
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'no_pasien' => 'required|unique:pasiens,no_pasien,' . $id,
            'nama' => 'required|min:3',
            'umur' => 'required|numeric',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'nullable',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:10000',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->fill($requestData);

        if ($request->hasFile('foto')) {
            if ($pasien->foto) {
                Storage::delete($pasien->foto);
            }
            $pasien->foto = $request->file('foto')->store('public/foto_pasien');
        }

        $pasien->save();

        return redirect()->route('pasien.index')->with('success', 'Data pasien berhasil diupdate.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);

        if ($pasien->daftar->count() >= 1) {
            flash('Oops.. Data tidak bisa dihapus karena terkait dengan data pendaftaran')->errors();
        }
        if ($pasien->foto) {
            Storage::delete($pasien->foto);
        }

        // Delete the patient record
        $pasien->delete();

        // Redirect to the pasien index page
        return redirect()->route('pasiens.index')->with('success', 'Data pasien berhasil dihapus.');
    }
}
