<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class RelasiController extends Controller
{
    public function oneToOne()
    {
        $mahasiswas = Mahasiswa::with('wali')->get();
        return view('relasi.one_to_one', compact('mahasiswas'));
    }

    public function oneToMany()
    {
        // Ambil dosen beserta mahasiswa bimbingannya
        $dosens = Dosen::with('mahasiswas')->get();
        return view('relasi.one_to_many', compact('dosens'));
    }
    public function manyToMany()
    {
        $mahasiswas = Mahasiswa::with('hobis')->get();
        return view('relasi.many_to_many', compact('mahasiswas'));
    }
    public function eloquent()
    {
        $mahasiswas = Mahasiswa::with('wali', 'dosen', 'hobis')->get();
        return view('relasi.eloquent', compact('mahasiswas'));
    }
}
