<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    // Laravel otomatis pakai tabel 'biodatas', jadi pastikan migration-nya juga pakai nama itu
    protected $table = 'biodatas';

    protected $fillable = [
        'nama',
        'tgl_lahir',
        'jk',
        'agama',
        'alamat',
        'foto',
        'tinggi_badan',
        'berat_badan',
    ];
}