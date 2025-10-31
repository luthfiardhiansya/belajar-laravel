<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RelasiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\WaliController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Produk2Controller;


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

route::get('test-model',function(){
$data = App\Models\Post::all();
return $data;
});

route::get('create-data',function(){
$data = App\Models\Post::create([
    'title'=>'belajar PHP2',
    'content'=>'lorem ipsum2'
]);
return $data;
});

Route::get('show-data/{id}', function ($id){
    $data = App\Models\Post::find($id);
    return $data;
});

Route::get('edit-data/{id}', function($id){
$data = App\Models\Post::find($id);
$data->title = "membangun project dengan laravel";
$data->content = "haloooo";
$data->save();
return $data;
});

Route::get('delete-data/{id}', function($id){
    $data = App\models\Post::find($id);
    $data->delete();
    //di kembalian (di alihkan) ke halaman test-model
    return redirect('test-model');
});

Route::get('search/{cari}',function($query){
    $data = App\Models\Post::where('title', 'like', '%' . $query . '%')->get();
    return $data;
});

Route::get('greetings',[MyController::class,'hello']);
Route::get('student', [MyController::class, 'siswa1']);

Route::resource('produk', App\Http\Controllers\ProdukController::class)->middleware('auth');

Route::resource('biodata', App\Http\Controllers\BiodataController::class);

Route::get('/one-to-one', [RelasiController::class, 'oneToOne']);

Route::get('/one-to-many', [RelasiController::class, 'oneToMany']);

Route::get('/many-to-many', [RelasiController::class, 'manyToMany']);

Route::get('eloquent', [RelasiController::class, 'eloquent']);

Route::resource('dosen', App\Http\Controllers\DosenController::class)->middleware('auth');

Route::resource('hobi', App\Http\Controllers\HobiController::class)->middleware('auth');

Route::resource('mahasiswa',App\Http\Controllers\MahasiswaController::class);

Route::resource('wali', App\Http\Controllers\WaliController::class);

Route::resource('pelanggan', App\Http\Controllers\PelangganController::class);

Route::resource('transaksi', App\Http\Controllers\TransaksiController::class);

Route::resource('produk2', App\Http\Controllers\Produk2Controller::class);
























// Contoh di App\Http\Controllers\AuthController.php
//    use Illuminate\Http\Request;
//    use Illuminate\Support\Facades\Auth;

//    public function showLoginForm()
//    {
//        return view('auth.login'); // Membuat view login
//    }

//    public function login(Request $request)
//    {
//        $credentials = $request->validate([
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);

//        if (Auth::attempt($credentials)) {
//            $request->session()->regenerate();
//            return redirect()->intended('home'); // Redirect ke halaman yang diinginkan setelah login
//        }

//       return back()->withErrors([
//            'email' => 'Kredensial tidak valid.',
//        ]);
//    }





    // routes/web.php
//    use App\Http\Controllers\AuthController;
//    use Illuminate\Support\Facades\Route;
//
//    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
//    Route::post('/login', [AuthController::class, 'login'])->name('login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
