<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;
    protected $table= "alumni_kata";

    protected $fillable = [
        'id',
        'alumni_id',
        'kutipan_alumni',

    ];


    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'id');
    }

}
