<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiskusiKomentar extends Model
{
    use HasFactory;
    protected $table='diskusi_komentar';
    protected $guarded = [];
    public function diskusi()
    {
        return $this->belongsTo(Diskusi::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
