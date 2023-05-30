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
'income'=>'required|numeric',
'rationcard'=>'required',
'typeofrationcard'=>'required',
'rationcardnumber'=>'required|numeric',
'address'=>'required',
]);

$basic_details= BasicDetailsModel::create([
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

$store=$basic_details->id;
$data=session()->put('basic_details_id', $store);

  return response()->json(['status' => 'success']);


}
public function basic_edit(Request $request)
{

$id=$request->id;


   $basic= BasicDetailsModel::where('id','=',$id)->first();
   $housetypes=BasicDetailsModel::get();
   $religion=BasicDetailsModel::get();
   $caste=BasicDetailsModel::get();
   $typeofrationcard=BasicDetailsModel::get();

//    $rationcard=BasicDetailsModel::get();

//    dd($basic);

   return view('wards.basic-edit',compact('basic','housetypes','religion','caste','typeofrationcard'));

}
public function update(Request $request)
{

    $housenumber=$request->house_no;
    $housedetails=$request->house_details;
    $housetypes=$request->type_of_house;
    $religion=$request->religion;
    $income=$request->annual_income;
    $rationcard=$request->ration_card;
    $typeofrationcard=$request->type_of_ration_card;
    $rationcardnumber=$request->ration_card_no;
    $address=$request->address;




 $image = $request->file('upload_photo');

 // Set the target size in bytes (15KB = 15 * 1024 bytes)
 $targetSize = 15 * 1024;

 // Generate a unique filename
 $filename = time() . '_' . $image->getClientOriginalName();

 // Move the uploaded file to the public/images directory
 $image->move(public_path('images'), $filename);

 // Compress the image
 $compressedFilename = $this->compressImage(public_path('images/' . $filename), $targetSize);

    $data= House_owner_details::updateOrCreate([
        'id'=>$request->basic_id,
    ],[
            'house_no'=>$housenumber,
            'house_details'=>$housedetails,
            'type_of_house'=>$housetypes,
            'religion'=>$religion,
            'annual_income'=>$income,
            'religion'=>$religion,
            'ration_card'=>$rationcard,
            'type_of_ration_card'=>$typeofrationcard,
            'ration_card_no'=>$rationcardnumber,
            'address'=>$address,


        ]);



                 return response()->json(['status'=>'success']);

}


}
