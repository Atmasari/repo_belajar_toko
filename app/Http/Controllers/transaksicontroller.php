<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use Illuminate\Support\Facades\Validator;

class transaksicontroller extends Controller
{
  public function show()
  {
    $data_transaksi = transaksi::join('barang','barang.kode_barang', 'transaksi.kode_barang')
                                ->join('customer', 'customer.id_customer', 'transaksi.id_customer');
    return Response()->json($data_transaksi);
  }
  public function detail($id)
  {
    if(transaksi::where('id',$id)->exist()){
      $data_transaksi = transaksi::join('barang','barang.kode_barang')
                      ->join('customer','customer.id_customer')
                      ->join('transaksi.id_transaksi')
                      ->where('transaksi.id','=',$id)
                      ->get();

                      return Response()->json($data_transaksi);

    }
    else {
      return Response()-json(['message' => 'Tidak Ditemukan']);
    }
  }
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
