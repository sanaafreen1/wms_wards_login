<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\{House_owner_details,BasicDetailsModel,CitizenServiceMst,FamilyMemberModel};



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function wardshome()
    {


    $houseCount = BasicDetailsModel::count();
    $familyMemberCount = FamilyMemberModel::count();
    $serviceCount = CitizenServiceMst::count();


   return view('wards.home',compact('houseCount', 'familyMemberCount', 'serviceCount'));
    }

    public function wards_add_member()
    {
       return view('wards.add-members-details');

    }

    public function wards_house_owner()
    {
       return view('wards.house-owner-details');

    }

    public function wards_family_member()
    {
       return view('wards.family-member-details');

    }

    public function wards_enter_service()
    {
       return view('wards.enter-service-details');

    }

    public function wards_reports()
    {
       return view('wards.reports');

    }
}
