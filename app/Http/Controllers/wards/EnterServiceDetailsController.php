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

      $cnt = count($request->document);
     $service= $request->service;
     $subservice = $request->subservice;
      for($i = 0; $i < $cnt; $i++)
      {
        $document = $request->document[$i];
        EnterServiceDetails::updateOrCreate([
            'service_id' => $service,
            'sub_service_id' => $subservice,
            'document_id' => $document
          ],
        [
            'service_id' => $service,
            'sub_service_id' => $subservice,
            'document_id' => $document,
            'created_by' => Auth::id(),
        ]);
      }

      return response()->json(['status' => 'success']);




}

}
