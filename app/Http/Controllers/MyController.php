<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function hello()
    {
        $nama = "luthfi";
        $umur = 16;

        return view('hello', compact('nama', 'umur'));
    }

    public function siswa1()
    {
        $data = [
            ['nama'=> 'rehan', 'kelas'=> 'XI RPL 3'],
            ['nama'=> 'dadan', 'kelas'=> 'XI RPL 3'],
            ['nama'=> 'jumbo', 'kelas'=> 'XI RPL 1'],
        ];

        return view('siswa1', compact('data'));
    }
}
