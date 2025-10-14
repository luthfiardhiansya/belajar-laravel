<?php
namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Seeder;

class DosenMahasiswaSeeder extends Seeder
{
    public function run()
    {
        $dosen1 = Dosen::create([
            'nama' => 'MR. Ironi',
            'nipd' => 'D001',
        ]);

        $dosen2 = Dosen::create([
            'nama' => 'Prof. Shani',
            'nipd' => 'D002',
        ]);

        // Tambahkan mahasiswa ke masing-masing dosen
        $dosen1->mahasiswas()->createMany([
            ['nama' => 'Luthfi', 'nim' => '10'],
            ['nama' => 'Lintang', 'nim' => '13'],
        ]);

        $dosen2->mahasiswas()->createMany([
            ['nama' => 'Jumbo', 'nim' => '16'],
            ['nama' => 'Mancuy', 'nim' => '18'],
        ]);
    }
}
