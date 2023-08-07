<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    use HasFactory;
    protected $table = 'diskusi';
    protected $guarded = [];
    protected $appends = ['jumlahKomentar'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
