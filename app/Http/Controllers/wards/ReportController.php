<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FamilyMemberModel;

class ReportController extends Controller
{

  public function wards_reports(Request $request){

    $query = FamilyMemberModel::query();


    if ($request->filled('owner_name')) {
        $query->where('owner_name', 'like', '%' . $request->input('owner_name') . '%');
    }

    if ($request->filled('house_no')) {
        $query->where('house_no', $request->input('house_no'));
    }

    if ($request->filled('mobilenumber')) {
        $query->where('mobilenumber', $request->input('mobilenumber'));
    }


    $report = $query->get();

    return view('reports', compact('report'));
}


  }

  