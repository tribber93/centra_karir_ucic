<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Event\Tracer\Tracer;

class HasilTracer extends Model
{
    protected $table = 'hasil_tracer';
    protected $fillable = [
        // Kolom yang dapat diisi
        'tracer_id', 'jawaban', 'alumni_id'
    ];
    protected $casts = [
        // Kolom yang bertipe data JSON
        'jawaban' => 'array',
    ];
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }
    // public function tracer()
    // {
    //     return $this->belongsTo(Tracer::class);
    // }



}
