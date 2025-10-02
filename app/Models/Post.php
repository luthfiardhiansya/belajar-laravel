<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{ 
    //table yang digunakan untuk model ini adalah 'post'
    //protected $table = 'post';

    //apa yang di isi
    public $fillable = ['title','content'];

    //apa aja yang di tampilkan
    public $visible = ['id','title','content'];

    //mengisi tanggal kapan dibuat dan kapan di update secara otomatis
    public $timestamps = true;
}