<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CitizenServiceMst;


class EnterServiceDetailsController extends Controller
{
   public function wards_enter_service()
   {

  $service = CitizenServiceMst::get();

    return view ('wards.enter-service-details',compact('service'));
   }

   public function create(Request $request){


    dd($request->all());
   }
}
