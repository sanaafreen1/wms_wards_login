<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\{House_owner_details,EducationDetailsMst,EducationMst,OccupationMst};
 
use Session;

class HousedetailsController extends Controller
{
    public function wards_house_owner()
    {
       $data= House_owner_details::get();
       $education=EducationMst::get();
       $details=EducationDetailsMst::get();
       $occupation=OccupationMst::get();

       return view('wards.house-owner-details',compact('data','education','details','occupation'));

    }


    public function create(Request $request)
    {
        // dd($request->all());
       $this->validate($request,[
        'owner_name'=>'required|regex:/^[a-zA-Z\s]+$/',
        'date_of_birth'=>'required',
        'mobilenumber'=>'required|digits:10',
        'education'=>'required',
        'education_details'=>'required',
        'staying_town'=>'required',
        'location_of_person'=>'required',
        'details'=>'required',
        'occupation'=>'required',
        'gender'=>'required',
        'blood_group'=>'required',
        'file'=>'required',
        'bp'=>'nullable',
        'sugar'=>'nullable',
        'covidvaccine'=>'nullable',
        'pension'=>'required_with:type_pension',
        'type_pension'=>'required_with:pension',
       ],

    [
        'owner_name.regex' => 'The :owner name field can only contain letters.',

    ]);
       $basicdetails_id=session()->get('basic_details_id');
       $owner=$request->owner_name;
       $dob=$request->date_of_birth;
       $mobilenumber=$request->mobilenumber;
       $education=$request->education;
       $education_details=$request->education_details;
       $staying_town=$request->staying_town;
       $location=$request->location_of_person;
       $details=$request->details;
       $occupation=$request->occupation;
       $gender=$request->gender;
       $bp=$request->bp;
       $sugar=$request->sugar;
       $covid_vaccine=$request->covidvaccine;
       $pension=$request->pension;
       $blood_group=$request->blood_group;
    //    $type_pension=$request->type_pension;


    $file=$request->file('file');
    $extension=$file->getClientOriginalName();
    $filename=time().'.'.$extension;
    //dd($filename);
    $file->move(base_path('/public/images'),$filename);


  $data= House_owner_details::create([
    'basic_details_id' =>$basicdetails_id,
        'owner_name'=>$owner,
        'date_of_birth'=>$dob,
        'mobilenumber'=>$mobilenumber,
        'education'=>$education,
        'education_details'=>$education_details,
       'staying_of_the_town'=>$staying_town,
        'location_of_the_person'=>$location,
        'details'=>$details,
        'occupation'=>$occupation,
        'gender'=>$gender,
        'blood_group'=>$blood_group,

'covid_vaccine'=>$covid_vaccine,
        'bp'=>$bp,
       'sugar'=>$sugar,
       'pension'=>$pension,
        'blood_group'=>$blood_group,
        // 'type_of_pension'=>$type_pension,
        'upload_photo'=>$filename,

     ]);

// $item=$data->id;
// //    $unique =session()->put('id', $item);

// // dd($unique);



return response()->json(['status' => 'success']);

    }

}
