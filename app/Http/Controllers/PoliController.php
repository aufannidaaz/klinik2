<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polis = Poli::all(); // Ambil semua data poli
        return view('polis_index', compact('polis')); // Pastikan ada file view bernama polis_index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polis_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'biaya' => 'required',
        ]);

        Poli::create($request->all());
        return redirect()->route('polis.index')->with('success', 'Poli berhasil ditambahkan.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Poli $poli)
    {
        return view('polis_show', compact('poli'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $poli = Poli::findOrFail($id); // Pastikan data ditemukan atau tampilkan 404
        return view('polis_edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'biaya' => 'required|numeric',
            'keterangan' => 'nullable|string',
        ]);

        // Cari data berdasarkan ID dan update
        $poli = Poli::findOrFail($id);
        $poli->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('polis.index')->with('success', 'Data Poli berhasil diupdate.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poli $poli)
    {
        $poli->delete();
        return redirect()->route('polis.index')->with('success', 'Poli berhasil dihapus.');
    }
}
