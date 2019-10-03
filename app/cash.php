<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cash extends Model
{
    protected $fillable = [
        'kode_cash','KTP','moblis_id',
        'cash_tgl','cash_bayar'
    ];
    public $timestamps = true;
}