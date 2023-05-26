<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyMemberModel extends Model
{
    use HasFactory;

    protected $table = "family_members_details";
    protected $guarded=[];

    public function owners()
    {
        return $this->belongsTo(House_owner_details::class,'houseownerdetails_id','id');
    }
    public function educations()
    {
        return $this->belongsTo(EducationMst::class,'education','id');
    }

    public function educationsdetails()
    {
        return $this->belongsTo(EducationDetailsMst::class,'education_details','id');
    }
    public function occupations()
    {
        return $this->belongsTo(OccupationMst::class,'occupation','id');
    }
    public function pensions()
    {
        return $this->belongsTo(TypeOfPensionMst::class,'occupation','id');
    }

}
