<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// basic
route::get('about', function(){
    return '<h1>hallo </h1>'.
           '<br>selamat datang di perpustakaan digital';
});

route::get('bio', function(){
    return '<h1>biodata </h1>'.
           '<br>nama: Muhammad Luthfi Ardhiansyah'.
           '<br>kelas: XI-RPL'.
           '<br>alamat: Sekeawi';
});

route::get('buku', function(){
    return view('buku');
});

route::get('menu',function(){
$data = [
        ['nama_makanan'=>'bala-bala','harga'=>1000,'jumlah'=>10],
        ['nama_makanan'=>'gehu pedas','harga'=>2000,'jumlah'=>15],
        ['nama_makanan'=>'cireng isi ayam','harga'=>2500,'jumlah'=>5],
];
$resto = "resto MPL - Makanan Penuh Lemak";
return view('menu',compact('data','resto'));
});

route::get('books/{judul}',function($a){
        return 'judul buku : ' .$a;
});

route::get('post/{title}/{category}', function($a, $b){
    return view('post',['judul'=>$a, 'cat' =>$b]);
});

route::get('profile/{nama?}',function($a = "no name"){
    return 'halo nama saya '.$a;
});

route::get('order/{item?}', function($a = "nasi"){
    return view('order',compact('a'));
});

route::get('toko',function(){
$data = [
        ['alat_tulis'=>'buku','harga'=>15000,'qty'=>2],
        ['alat_tulis'=>'pensil','harga'=>2000,'qty'=>5],
        ['alat_tulis'=>'penggaris','harga'=>2500,'qty'=>1],
];
$toko_tulis = "toko alat tulis pak jumbo";
return view('toko',compact('data','toko_tulis'));
});

route::get('siswa',function(){
$data = [
        ['nama_siswa'=>'ijat','mapel'=>'B.indonesia','nilai'=>60],
        ['nama_siswa'=>'jarot','mapel'=>'B.indonesia','nilai'=>77],
        ['nama_siswa'=>'jumbo','mapel'=>'B.indonesia','nilai'=>89],
];
$kelas = "keterangan siswa";
return view('siswa',compact('data','kelas'));
});

route::get('akademik/{nama?}/{nilai?}', function($a = "Tidak Ada Nilai", $b = "Tidak Ada Nilai") {
    return view('akademik', compact('a', 'b',));
});

Route::get('nilai', function () {
    $data = [
        ['nama' => 'andi', 'nilai' => 85],
        ['nama' => 'budi', 'nilai' => 70],
        ['nama' => 'citra', 'nilai' => 95],
    ];
    return view('nilai', compact('data'));
});