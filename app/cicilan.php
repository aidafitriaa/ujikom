<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cicilan extends Model
{
    protected $fillable = [
        'kode_cicilan','kode_kredit','tgl_cicilan','jumlah_cicilan',
        'cicilan_ke','cicilan_sisa_ke','cicilan_harga_ke'
    ];
    public $timestamps = true;
}