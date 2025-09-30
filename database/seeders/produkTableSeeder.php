<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class produkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product =[
            ['nama' => 'chiki', 'jumlah' => 5, 'harga' => '2000', 'stok' => 20],
            ['nama' => 'roti', 'jumlah' => 3, 'harga' => '5000', 'stok' => 5],
            ['nama' => 'ale-ale', 'jumlah' => 5, 'harga' => '1000', 'stok' => 22],
            ['nama' => 'lifeboy', 'jumlah' => 2, 'harga' => '2500', 'stok' => 7],
            ['nama' => 'nuvo', 'jumlah' => 2, 'harga' => '3000','stok' => 12]
        ];
        DB::table('produk')->insert($product);
    }
}
