<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CitizenServiceMst,CitizenSubServiceMst,DocumentMst,EnterServiceDetails};
use Illuminate\Support\Facades\Auth;


class EnterServiceDetailsController extends Controller
{
   public function wards_enter_service()
   {

  $service = CitizenServiceMst::get();
 $sub_service= CitizenSubServiceMst::get();
 $document=DocumentMst::get();
// dd($service);
    return view ('wards.enter-service-details',compact('service','sub_service','document'));
   }
   public function getsubservice(Request $request)
   {
       $data['subservice'] = CitizenSubServiceMst::where('service_id',$request->id)->where('status','=','0')
       ->get(['sub_service_name','sub_service_id']);
       return response()->json($data);
   }

   public function create(Request $request){


    // dd($request->all());

    $request->validate([
        'service' => 'required',
        'subservice' => 'required',
        'document' => 'required|array',
    ]);
    $basicdetails_id=session()->get('basic_details_id');
    $house_ownerdetails_id=session()->get('house_ownerdetails_id');


      $cnt = count($request->document);
     $service= $request->service;
     $subservice = $request->subservice;
      for($i = 0; $i < $cnt; $i++)
      {
        $document = $request->document[$i];
        EnterServiceDetails::updateOrCreate([
    'basic_details_id' =>$basicdetails_id,
      'house_owner_id'=>$house_ownerdetails_id,
            'service_id' => $service,
            'sub_service_id' => $subservice,
            'document_id' => $document
          ],
        [ 'basic_details_id' =>$basicdetails_id,
        'house_owner_id'=>$house_ownerdetails_id,
            'service_id' => $service,
            'sub_service_id' => $subservice,
            'document_id' => $document,
            'created_by' => Auth::id(),
        ]);
      }

      return response()->json(['status' => 'success']);




}

public function edit($id)
{
    $service = CitizenServiceMst::get();
    // dd($service);
    $document=DocumentMst::get();
    $update= EnterServiceDetails::where('id','=',$id)->first();
    $serv_id = $update->service_id;

    $subservice =CitizenSubServiceMst::where('service_id',$serv_id)->get();
        // dd($document);



    return view('wards.enter_service_edit',compact('update','service','document','subservice','serv_id'));
}

public function update( Request $request){

    $id = $request->id;

    $basicdetails_id=session()->get('basic_details_id');
    $house_ownerdetails_id=session()->get('house_ownerdetails_id');


      $cnt = count($request->document);
     $service= $request->service;
     $subservice = $request->subservice;
      for($i = 0; $i < $cnt; $i++)
      {
        $document = $request->document[$i];
        EnterServiceDetails::where('id',$id)->update([
    'basic_details_id' =>$basicdetails_id,
      'house_owner_id'=>$house_ownerdetails_id,
            'service_id' => $service,
            'sub_service_id' => $subservice,
            'document_id' => $document
          ],
        [ 'basic_details_id' =>$basicdetails_id,
        'house_owner_id'=>$house_ownerdetails_id,
            'service_id' => $service,
            'sub_service_id' => $subservice,
            'document_id' => $document,
            'created_by' => Auth::id(),
        ]);
      }

      return response()->json(['status' => 'success']);




}


}
