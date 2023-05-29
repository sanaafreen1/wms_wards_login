<?php

namespace App\Http\Controllers\wards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
<<<<<<< Updated upstream
use Illuminate\Support\Facades\File;
use App\Models\{FamilyMemberModel,RelationMst,EducationMst,EducationDetailsMst,OccupationMst,TypeOfPensionMst};
=======
use File;
use App\Models\{FamilyMemberModel,RelationMst,EducationMst,EducationDetailsMst,OccupationMst,TypeOfPensionMst,Bloodgroup};
>>>>>>> Stashed changes
use Illuminate\Support\Facades\Session;

class FamilyMemersDetailsController extends Controller
{
    public function wards_family_member()
    {
        $relation=RelationMst::where('id','!=',"1")->get();
        $education=EducationMst::get();
        $educationdetails=EducationDetailsMst::get();
        $occupation=OccupationMst::get();
        $typofpension=TypeOfPensionMst::get();
        $blood=Bloodgroup::get();

        return view('wards.family-member-details',compact('relation','education','educationdetails','occupation','typofpension','blood'));
    }

    public function create(Request $request)
    {
        // dd($request->all());
       $this->validate($request,[
                   'relation_with_houseowner'=>'required',
                   'member_name'=>'required',
                    'date_of_birth'=>'required',
                    'mobile'=>'required|digits:10',
                    'education'=>'required',
                    'education_details'=>'required',
                    'staying_out_oftown'=>'nullable',
                    'location_ofthe_person'=>'required',
                    'enter_the_details'=>'required',
                    'occupation'=>'required',
                    'gender'=>'required',
                    'blood_group'=>'required',
                    'b_p'=>'nullable',
                    'sugar'=>'nullable',
                    'covid_vaccine'=>'nullable',
                    'pension' => 'required_with:type_of_pension',
                    'type_of_pension'=>'required_with:pension',
                    'upload_photo'=>'required|image|mimes:jpg,png,jpeg,gif,bmp',


                 ]);
                 $basicdetails_id=session()->get('basic_details_id');
       $house_ownerdetails_id=session()->get('house_ownerdetails_id');

                 $image = $request->file('upload_photo');

                 // Set the target size in bytes (15KB = 15 * 1024 bytes)
                 $targetSize = 15 * 1024;

                 // Generate a unique filename
                 $filename = time() . '_' . $image->getClientOriginalName();

                 // Move the uploaded file to the public/images directory
                 $image->move(public_path('images'), $filename);

                 // Compress the image
                 $compressedFilename = $this->compressImage(public_path('images/' . $filename), $targetSize);
              
               $familyid=  FamilyMemberModel::insert([
                'basic_details_id' =>  $basicdetails_id,
                'houseownerdetails_id'=>   $house_ownerdetails_id,
                    'relation_with_houseowner'=>$request->relation_with_houseowner,
                    'member_name'=>$request->member_name,
                    'date_of_birth'=>$request->date_of_birth,
                    'education'=>$request->education,
                    'mobile'=>$request->mobile,
                    'education_details'=>$request->education_details,
                    'staying_out_oftown'=>$request->staying_out_oftown,
                    'location_ofthe_person'=>$request->location_ofthe_person,
                    'enter_the_details'=>$request->enter_the_details,
                    'occupation'=>$request->occupation,
                    'gender'=>$request->gender,
                    'blood_group'=>$request->blood_group,
                    'b_p'=>$request->b_p,
                    'sugar'=>$request->sugar,
                    'covid_vaccine'=>$request->covid_vaccine,
                    'type_of_pension'=>$request->type_of_pension,
                    'upload_photo'=>$compressedFilename,


                 ]);


                 return response()->json(['status'=>'success']);
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
               imagejpeg($compressedImage, public_path('upload/' . $compressedFilename), 75);

               // Free up memory
               imagedestroy($image);
               imagedestroy($compressedImage);

               // Delete the original image
               File::delete($filePath);

               return $compressedFilename;
           }



}
