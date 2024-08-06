<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    use HasFactory;

    protected $table = "keterangan";
    protected $guarded = [
        'id'
    ];

    public function bajus()
    {
        return $this->hasMany(Baju::class);
    }
}
