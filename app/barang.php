<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang'; // nama tabel nya salah
    // coba ini saya update ya nak, saya tambahin komentar seperti ini, berarti kan
    // berubah isi file nya, ketika di save, muncul di sebelah kanan.
    // iya pak, laluu
    // lalu stage all dan lakukan commit, setalah kommit berhasil, lakukan push
    public $timestamps = false;

    protected $fillable = ['kode_barang','nama_barang','harga','id_customer'];
}
