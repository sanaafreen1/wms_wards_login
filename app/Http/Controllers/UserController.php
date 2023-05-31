<?php

namespace App\Http\Controllers;

use App\Models\BasicDetailsModel;
use App\Models\CitizenServiceMst;
use App\Models\DocumentMst;
use App\Models\EnterServiceDetails;
use App\Models\FamilyMemberModel;
use Illuminate\Http\Request;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function wardshome()
    {

        $Houses=BasicDetailsModel::count();
        $families=FamilyMemberModel::count();
        // $services=CitizenServiceMst::count();
        $services = EnterServiceDetails::groupBy('basic_details_id')->count();
        //dd($services);
        $count1=EnterServiceDetails::groupBy('basic_details_id')->where('service_status',1)->count();
        $count2=EnterServiceDetails::groupBy('basic_details_id')->where('service_status',2)->count();
        $count3=EnterServiceDetails::groupBy('basic_details_id')->where('service_status',3)->count();
        $count4=EnterServiceDetails::groupBy('basic_details_id')->where('service_status',4)->count();
        //dd($count1);

       return view('wards.home',get_defined_vars());
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
