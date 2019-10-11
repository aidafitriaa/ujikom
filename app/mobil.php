<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    protected $fillable = [
        'kode_mobil','merk','type','warna',
        'harga_mobil','gambar'
    ];
    public $timestamps = true;

    
}
