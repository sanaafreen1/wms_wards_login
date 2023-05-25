<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{FamilyMemberModel,OccupationMst,EducationMst,BasicDetailsModel};

class ReportController extends Controller
{

  public function wards_reports(Request $request ){


            $occupation=OccupationMst::get();
            $education= EducationMst::get();
            $family=FamilyMemberModel::get();

            $details=BasicDetailsModel::get();
    return view('wards.reports',compact('education', 'occupation','family','details'));
}

public function wards_family_report()
{
    $family=FamilyMemberModel::get();
return view('wards.family-report',compact('family'));
}

public function member_full_details()
{
    $family=FamilyMemberModel::first();

    return view('wards.member-full-details',compact('family'));
}
  }

