<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;
    protected $table = "alumni";
    // protected $fillable = [
    //     'id',
    //     'nama_alumni',
    //     'image',

    // ];
    protected $guarded = [];
    // public function testimoni()
    // {
    //     return $this->hasMany(Testimoni::class, 'id', 'alumni_id');
    // }
}
