<?php

namespace App\Models;

use App\Models\Galeri;
use App\Models\Ulasan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lokasi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lokasi()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function galery()
    {
        return $this->hasMany(Galeri::class);
    }
}
