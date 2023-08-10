<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Histori extends Model
{
    use HasFactory;
    protected $table ='histori';
    protected $casts = [
        'jawaban' => 'array',
    ];
    protected $guarded = [];
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id');
    }
}
