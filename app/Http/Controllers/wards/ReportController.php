<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{FamilyMemberModel,OccupationMst,EducationMst};

class ReportController extends Controller
{

  public function wards_reports(Request $request ){
dd($request->all());




        $occupation=OccupationMst::get();
        $education= EducationMst::get();

    return view('wards.reports',compact('education', 'occupation'));
}


  }

