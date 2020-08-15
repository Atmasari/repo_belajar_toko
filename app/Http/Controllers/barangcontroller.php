<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Illuminate\Support\Facades\Validator;

class barangcontroller extends Controller
{
  public function store (Request $request){
      $validator=Validator::make($request->all(),
      [
        // 'kode_barang' => 'required', kalau dia auto increment, ga perlu di required, siapp
        'nama_barang' => 'required',
        'harga' => 'required',
        'id_customer' => 'required'
      ]
    );

      if ($validator->fails()) {
        return Response()->json($validator->errors());

    }
    $simpan = barang::create([
      'kode_barang' => $request->kode_barang,
      'nama_barang' => $request->nama_barang,
      'harga' => $request->harga,
      'id_customer' => $request->id_customer

    ]);

    if($simpan) {
      return Response()->json(['status'=>1]);
    }
    else {
      return Response()->json(['status'=>0]);

  }

    }
}
