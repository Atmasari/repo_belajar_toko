<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'kelas';
    public $timestamps = false;

    protected $fillable = ['kode_barang','nama_barang','harga','id_customer'];
}
