<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tempat_wisata extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function destinasis()
    {
        return $this->belongsTo(Destinasi::class, 'destinasis_id');
    }

    public function kategoris()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id');
    }
}
