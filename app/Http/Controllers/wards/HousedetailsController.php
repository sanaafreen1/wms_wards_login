<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;
use  App\Models\{House_owner_details,EducationDetailsMst,EducationMst,OccupationMst,FamilyMemberModel,Bloodgroup,TypeOfPensionMst};
use Session;

class HousedetailsController extends Controller
{
    public function wards_house_owner()
    {
       $data= House_owner_details::get();
       $education=EducationMst::get();
       $details=EducationDetailsMst::get();
       $occupation=OccupationMst::get();
       $blood=Bloodgroup::get();


       return view('wards.house-owner-details',compact('data','education','details','occupation','blood'));

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
        'upload_photo'=>'required|image|mimes:jpg,png,jpeg,gif,bmp',
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
       $type_pension=$request->type_pension;


    // $file=$request->file('file');
    // $extension=$file->getClientOriginalName();
    // $filename=time().'.'.$extension;
    // //dd($filename);
    // $file->move(base_path('/public/asset/images'),$filename);


    $image = $request->file('upload_photo');

    // Set the target size in bytes (15KB = 15 * 1024 bytes)
    $targetSize = 15 * 1024;

    // Generate a unique filename
    $filename = time() . '_' . $image->getClientOriginalName();

    // Move the uploaded file to the public/images directory
    $image->move(public_path('images'), $filename);

    // Compress the image
    $compressedFilename = $this->compressImage(public_path('images/' . $filename), $targetSize);



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
        'type_of_pension'=>$type_pension,
        'upload_photo'=>$compressedFilename,


    ]);

     FamilyMemberModel::create([
        'basic_details_id' =>$basicdetails_id,
        'houseownerdetails_id'=>$data->id,
        'relation_with_houseowner'=>1,
        'member_name'=>$owner,
        'date_of_birth'=>$dob,
        'mobile'=>$mobilenumber,
        'education'=>$education,
        'education_details'=>$education_details,
       'enter_the_details'=>$details,
       'gender'=>$gender,
       'blood_group'=>$blood_group,
        'occupation'=>$occupation,
        'b_p'=>$bp,
        'sugar'=>$sugar,
        'covid_vaccine'=>$covid_vaccine,
        'pension'=>$pension,
      'type_of_pension'=>$type_pension,
      'upload_photo'=>$compressedFilename,
     ]);




$item=$data->id;
$unique =session()->put('house_ownerdetails_id', $item);

// dd($unique);

return response()->json(['status' => 'success']);

    }



    private function compressImage($filePath, $targetSize)
    {
        // Load the image
        $image = imagecreatefromjpeg($filePath);

        // Get the original image size
        $originalSize = filesize($filePath);

        // Calculate the compression ratio
        $compressionRatio = $targetSize / $originalSize;

        // Set the new image width and height based on the compression ratio
        $newWidth = imagesx($image) * sqrt($compressionRatio);
        $newHeight = imagesy($image) * sqrt($compressionRatio);

        // Create a new image resource with the desired dimensions
        $compressedImage = imagecreatetruecolor($newWidth, $newHeight);

        // Copy and resize the original image to the new resource
        imagecopyresampled(
            $compressedImage,
            $image,
            0,
            0,
            0,
            0,
            $newWidth,
            $newHeight,
            imagesx($image),
            imagesy($image)
        );

        // Save the compressed image with a new filename
        $compressedFilename = 'compressed_' . basename($filePath);
        imagejpeg($compressedImage, public_path('images/' . $compressedFilename), 75);

        // Free up memory
        imagedestroy($image);
        imagedestroy($compressedImage);

        // Delete the original image
        File::delete($filePath);

        return $compressedFilename;
    }

    public function wards_house_edit(Request $request)
    {
        $id=$request->id;
        $education=EducationMst::get();
    $details=EducationDetailsMst::get();
    $occupation=OccupationMst::get();
    $typ_of_pension=TypeOfPensionMst::get();
    $blood=Bloodgroup::get();
    // $stayingTown = $request->has('staying_town');
    $house= House_owner_details::where('id','=',$id)->first();
    // dd($house);
     return view('wards.edit_house_owner',compact('house','education', 'details','occupation', 'typ_of_pension','blood'));
    }


    public function update(Request $request)
{
    // $basicdetails_id=session()->get('basic_details_id');

    $id = $request->id;

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
    $type_pension=$request->type_pension;


if($request->hasFile('upload_photo')){
    $image = $request->file('upload_photo');

    // Set the target size in bytes (15KB = 15 * 1024 bytes)
    $targetSize = 15 * 1024;

    // Generate a unique filename
    $filename = time() . '_' . $image->getClientOriginalName();

    // Move the uploaded file to the public/images directory
    $image->move(public_path('images'), $filename);

    // Compress the image
    $compressedFilename = $this->compressImage(public_path('images/' . $filename), $targetSize);

    $data= House_owner_details::where('id',$id)->update([
            'upload_photo'=>$compressedFilename,
        ]);
}


    $data= House_owner_details::where('id',$id)->update([
        // 'basic_details_id' =>$basicdetails_id,
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
            'type_of_pension'=>$type_pension,

        ]);


  return response()->json(['status'=>'success']);

}

}
