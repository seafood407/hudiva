<?php

namespace App\Models;

use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ulasan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
