<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa_index');
    }
    public function create()
    {
        return view('mahasiswa_create');
    }
    public function tambah()
    {
        return view('mahasiswa_create');
    }
}
