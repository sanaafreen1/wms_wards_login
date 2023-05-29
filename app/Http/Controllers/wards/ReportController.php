<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{FamilyMemberModel,OccupationMst,EducationMst,BasicDetailsModel,House_owner_details};

class ReportController extends Controller
{

  public function wards_reports(Request $request ){

   $owner_name=$request->owner_name;
   $house_no=$request->house_no;
   $mobilenumber=$request->mobilenumber;

            $occupation=OccupationMst::get();
            $education= EducationMst::get();

            $details=BasicDetailsModel::
            when($house_no,function ($query) use($house_no) {
                return $query->where('house_no','LIKE', '%'.$house_no.'%');
              })
              ->whereHas('ownerdetails', function ($query) use ($owner_name) {
                $query->where('owner_name', 'LIKE', '%'.$owner_name.'%');
            })->whereHas('ownerdetails', function ($query) use ($mobilenumber) {
                $query->where('mobilenumber', 'LIKE', '%'.$mobilenumber.'%');
            })->
             with('ownerdetails')->
             get();

            // dd($details);



    return view('wards.reports',compact('education', 'occupation','details'));
}



public function wards_family_report($id)
{
    $family=FamilyMemberModel::where('houseownerdetails_id',$id)->with('relations')->get();
    // $family=FamilyMemberModel::with('relation')->get($id);
return view('wards.family-report',compact('family'));
}

public function member_full_details($id)
{
    $family=FamilyMemberModel::with('owners','educations','educationsdetails','bloodgroup','occupations','pensions')->find($id);
    // dd($family);

    return view('wards.member-full-details',compact('family'));
}

// public function ReportController()
// {
//     return view('wards.add_members_details');
// }





  }

