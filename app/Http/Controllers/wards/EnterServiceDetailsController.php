<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CitizenServiceMst,CitizenSubServiceMst,DocumentMst,EnterServiceDetails,Enter_service_documentModel};
use Illuminate\Support\Facades\Auth;
use DB;

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
        'service_status'=>'required',
    ]);
    $basicdetails_id=session()->get('basic_details_id');
    $house_ownerdetails_id=session()->get('house_ownerdetails_id');


      $cnt = count($request->document);
     $service= $request->service;
     $subservice = $request->subservice;
     $service_status=$request->service_status;


        $details = EnterServiceDetails::updateOrCreate([
    'basic_details_id' =>$basicdetails_id,
      'house_owner_id'=>$house_ownerdetails_id,
            'service_id' => $service,
            'sub_service_id' => $subservice,

            'service_status'=>$service_status,
          ],
        [ 'basic_details_id' =>$basicdetails_id,
        'house_owner_id'=>$house_ownerdetails_id,
            'service_id' => $service,
            'sub_service_id' => $subservice,

            'service_status'=>$service_status,
            'created_by' => Auth::id(),
        ]);

        for($i = 0; $i < $cnt; $i++)
        {
            $document = $request->document[$i];
            Enter_service_documentModel::insert([
                'enter_service_id' => $details->id,
                'document_id' => $document,
            ]);
        }

      return response()->json(['status' => 'success']);




}

public function edit($id)
{
    $service = CitizenServiceMst::get();

    $document=DocumentMst::get();
    $update= EnterServiceDetails::where('basic_details_id','=',$id)->get();
    $insert_document = Enter_service_documentModel::where('enter_service_id',$update[0]->id)->get();
    // dd($insert_document);


    $serv_id = $update[0]->service_id;
    $subservice =CitizenSubServiceMst::where('service_id',$serv_id)->get();

    return view('wards.enter_service_edit',compact('update','service','document','subservice','serv_id','insert_document'));
}

 public function update(Request $request){

    // $basicdetails_id=session()->get('basic_details_id');
    // $house_ownerdetails_id=session()->get('house_ownerdetails_id');


      $cnt = count($request->document);
     $service= $request->service;
     $subservice = $request->subservice;
     $service_status=$request->service_status;


     $id=$request->id;

    $details = EnterServiceDetails::where('id',$id)->update(
                [
                    // 'basic_details_id' =>$basicdetails_id,
                    // 'house_owner_id'=>$house_ownerdetails_id,
                    'service_id' => $service,
                    'sub_service_id' => $subservice,
                    'service_status'=>$service_status,
                    'created_by' => Auth::id(),
                ]
                );

            // dd($details);

            $del = Enter_service_documentModel::where('enter_service_id',$id)->delete();
                    // dd($del);
            for($i = 0; $i < $cnt; $i++)
            {
                $document = $request->document[$i];
                Enter_service_documentModel::insert([
                    'enter_service_id' => $id,
                    'document_id' => $document,
                ]);
            }

          return response()->json(['status' => 'success']);


 }




}



