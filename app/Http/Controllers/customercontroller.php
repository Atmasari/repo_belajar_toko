<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\customer;

class customercontroller extends Controller
{
  public function show()
  {
    return customer::all();
  }
  // ga rapi script nya, copas yaa? btulll
  public function store (Request $request){ //typomu nak
    $validator=Validator::make($request->all(),
    [
      'nama' => 'required'
    ]);
    if ($validator->fails()) {
      return Response()->json($validator->errors());
    }
    $simpan = customer::create([
      'nama' => $request->nama
    ]);

    if($simpan) {
      return Response()->json(['status'=>1]);
    }
    else {
      return Response()->json(['status'=>0]);

    }
  }
  public function update($id, Request $request)
  {
    $validator=Validator::make($request->all(),
    [
      'nama' => 'required'
    ]);
    if ($validator->fails()) {
      return Response()->json($validator->errors());
    }
    $ubah = customer::where('id_customer',$id)->update([
      'nama'=> $request-> nama
    ]);
    if ($ubah) {
      return Response()->json(['status'=> 1]);
    }
    else {
      return Response()->json(['status'=> 0]);
    }
  }
}
