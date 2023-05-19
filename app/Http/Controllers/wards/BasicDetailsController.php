<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BasicDetailsModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class BasicDetailsController extends Controller
{

public function wards_add_member()
{

//   $basicdel=  BasicDetailsModel::get();

//   $del=  session()->put('id', $basicdel );
//   dd($del);
   return view('wards.add-members-details');
}


public function create(Request $request){

// dd($request->all());
$this->validate($request,[
'housenumber'=>'required',
'housedetails'=>'required',
'housetypes'=>'required',
'religion'=>'required',
'caste'=>'required',
'income'=>'required',
'rationcard'=>'required',
'typeofrationcard'=>'required',
'rationcardnumber'=>'required',
'address'=>'required',
]);

$del= BasicDetailsModel::create([
    'house_no' => $request->housenumber,
    'house_details' => $request->housedetails,
    'type_of_house' => $request->housetypes,
   'religion' => $request->religion,
    'caste' => $request->caste,
    'annual_income' => $request->income,
    'ration_card' => $request->rationcard,
    'type_of_ration_card' => $request->typeofrationcard,
    'ration_card_no' => $request->rationcardnumber,
    'address' => $request->address,
    'created_by'=>Auth::id(),
]);

$store=$del->id;

 $data=session()->put('basicdetails_id', $store);

// $getdata= session()->get('id');

  return response()->json(['status' => 'success']);


}
}
