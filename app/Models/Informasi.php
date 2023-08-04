<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';
    protected $fillable = [
        // Kolom yang dapat diisi
        'penulis', 'jenis_informasi', 'judul', 'konten', 'kategori'
    ];
    use HasFactory;
}
