<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FamilyMemberModel;
use Illuminate\Support\Facades\Session;

class FamilyMemersDetailsController extends Controller
{
    public function wards_family_member()
    {
        return view('wards.family-member-details');
    }

    public function create(Request $request)
    {
        // dd($request->all());
       $this->validate(
                 $request,[
                   'relation_with_houseowner'=>'required',
                   'member_name'=>'required',
                    'date_of_birth'=>'required',
                    'mobile'=>'required',
                    'education'=>'required',
                    'education_details'=>'required',
                    'staying_out_oftown'=>'required',
                    'location_ofthe_person'=>'required',
                    'enter_the_details'=>'required',
                    'occupation'=>'required',
                    'gender'=>'required',
                    'blood_group'=>'required',
                    'type_of_pension'=>'required',
                    'upload_photo'=>'required',


                 ]);
               $familyid=  FamilyMemberModel::insert([
                    'relation_with_houseowner'=>$request->relation_with_houseowner,
                    'member_name'=>$request->member_name,
                    'date_of_birth'=>$request->date_of_birth,
                    'education'=>$request->education,
                    'education_details'=>$request->education_details,
                    'staying_out_oftown'=>$request->staying_out_oftown,
                    'location_ofthe_person'=>$request->location_ofthe_person,
                    'enter_the_details'=>$request->enter_the_details,
                    'occupation'=>$request->occupation,
                    'gender'=>$request->gender,
                    'blood_group'=>$request->blood_group,
                    'type_of_pension'=>$request->type_of_pension,
                    'upload_photo'=>$request->upload_photo,


                 ]);
                //  $data = ['id' => $familyid];
                //  $check=Session::put($data);
            // dd($check);
                 return response()->json(['status'=>'success']);
           }


}
