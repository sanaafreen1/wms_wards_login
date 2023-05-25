<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{FamilyMemberModel,OccupationMst,EducationMst};

class ReportController extends Controller
{

  public function wards_reports(Request $request ){
dd($request->all());

$query = FamilyMemberModel::query();

if (request('search')) {
    $query
        ->where('owner_name', 'like', '%' . request('search') . '%')
        ->orWhere('house_no', 'like', '%' . request('search') . '%')
        ->orWhere('mobilenumber', 'like', '%' . request('search') . '%');
}

if ($request->has(['field', 'sortOrder']) && $request->field != null) {
    $query->orderBy(request('field'), request('sortOrder'));
}


// return FamilyMemberModel::render('Users/Index', [
//     'users' => fn() => $query->paginate(10),
// ]);


        $occupation=OccupationMst::get();
        $education= EducationMst::get();

    return view('wards.reports',compact('education', 'occupation'));
}


  }

