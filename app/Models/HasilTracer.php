<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilTracer extends Model
{
    protected $table = 'hasil_tracer';
    protected $fillable = [
        // Kolom yang dapat diisi
        'tracer_id', 'jawaban'
    ];
    public function question()
    {
        return $this->belongsTo(Questions::class, 'tracer_id');
    }



}
