<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class pembeli extends Model
{
    protected $fillable = [
        'KTP','nama_embeli','alamat_pembeli','telp_pembeli'
    ];
    public $timestamps = true;

    public function kredit()
    {
        return $this->belongsTo('App\cash','KTP');
    }
}