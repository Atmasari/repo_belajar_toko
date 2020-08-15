<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class customercontroller extends Controller
{
  public function store (Request $request){
  $validator=Validator::make($request->all(),
  [
    'nama' => 'required'
  ]
);

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
}
