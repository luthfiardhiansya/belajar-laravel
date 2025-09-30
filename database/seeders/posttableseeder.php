<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class posttableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post =[
            ['title' => 'belajar laravel', 'content'=>'lorem ipsum'],
            ['title' => 'tips belajar laravel', 'content'=>'lorem ipsum'],
            ['title' => 'jadwal latihan workout bulanan', 'content'=>'lorem ipsum']
        ];

        DB::table('posts')->insert($post);
    }
}
