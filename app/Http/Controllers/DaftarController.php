<?php

namespace App\Http\Controllers;

use App\Models\Daftar; // Model untuk tabel daftar
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->filled('q')) {
            $daftar = \App\Models\Daftar::with('poli')->search(request('q'))->paginate(10);
        } else {
            $daftar = \App\Models\Daftar::with('poli')->latest()->paginate(10);
        }

        return view('daftar_index', compact('daftar'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = \App\Models\Pasien::orderBy('nama', 'asc')->get();
        $data['listPoli'] = \App\Models\Poli::orderBy('nama', 'asc')->get();
        return view('daftar_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'tanggal_daftar' => 'required|date',
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'keluhan' => 'required|string',
        ]);
        $daftar = new Daftar();
        $daftar->fill($requestData);
        $daftar->save();
        flash('Data berhasil disimpan')->success();



        return redirect()->route('daftar.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $daftar = Daftar::findOrFail($id);
        return view('daftar_show', compact('daftar'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        return view('daftar.edit', compact('daftar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daftar $daftar)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'poli_id' => 'required|exists:polis,id',
            'keluhan' => 'required|string',
            'tanggal_daftar' => 'required|date',
        ]);

        $daftar->update($request->all());

        return redirect()->route('daftar.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftar $daftar)
    {
        $daftar->delete();
        flash('Data berhasil dihapus')->success();
        return back();
    }
}
