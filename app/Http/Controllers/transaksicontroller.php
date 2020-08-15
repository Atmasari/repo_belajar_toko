<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transaksicontroller extends Controller
{
  public function store (Request $request){
  $validator=Validator::make($request->all(),
  [
    'kode_barang' => 'required',
    'id_customer' => 'required'
  ]
);

  if ($validator->fails()) {
    return Response()->json($validator->errors());

}
$simpan = transaksi::create([
  'kode_barang' => $request->kode_barang,
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
