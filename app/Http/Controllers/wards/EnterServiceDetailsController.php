<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{CitizenServiceMst,CitizenSubServiceMst};


class EnterServiceDetailsController extends Controller
{
   public function wards_enter_service()
   {

  $service = CitizenServiceMst::get();
 $sub_service= CitizenSubServiceMst::get();
// dd($service);
    return view ('wards.enter-service-details',compact('service','sub_service'));
   }
   public function getsubservice(Request $request)
   {
       $data['subservice'] = CitizenSubServiceMst::where('service_id',$request->id)->where('status','=','0')
       ->get(['sub_service_name','sub_service_id']);
       return response()->json($data);
   }

   public function create(Request $request){


    dd($request->all());
   }
}

