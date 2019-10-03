<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kredit extends Model
{
    protected $fillable = [
        'kode_kredit','KTP','paket_kredits_id',
        'mobils_id','tgl_kredit'
    ];
    public $timestamps = true;
}