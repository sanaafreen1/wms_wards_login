<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{FamilyMemberModel,OccupationMst,EducationMst,BasicDetailsModel};

class ReportController extends Controller
{

  public function wards_reports(Request $request ){
// dd($request->all());
    // $query = FamilyMemberModel::query();


    // if ($request->filled('owner_name')) {
    //     $query->where('owner_name', 'like', '%' . $request->input('owner_name') . '%');
    // }

    // if ($request->filled('house_no')) {
    //     $query->where('house_no', $request->input('house_no'));
    // }

    // if ($request->filled('mobilenumber')) {
    //     $query->where('mobilenumber', $request->input('mobilenumber'));
    // }


    // // $report = $query->get();

        $occupation=OccupationMst::get();
$education= EducationMst::get();
$family=FamilyMemberModel::get();

$details=BasicDetailsModel::get();
    return view('wards.reports',compact('education', 'occupation','family','details'));
}

public function wards_family_report()
{
return view('wards.family-report');
}
  }

