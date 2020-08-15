<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    public $timestamps = false;

    protected $fillable = ['id_customer','kode_barang'];
}
