<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tempat_wisatas()
    {
        return $this->hasMany(Tempat_wisata::class, 'destinasis_id', 'id');
    }
}
