<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    // use HasFactory;
    protected $table = 'tracer';
    protected $fillable = [
        // Kolom yang dapat diisi
        'opsi', 'pertanyaan'
    ];

    protected $casts = [
        // Kolom yang bertipe data JSON
        'opsi' => 'array',
    ];
}
