<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{House_owner_details,BasicDetailsModel};

class FamilyMemberModel extends Model
{
    use HasFactory;

    protected $table = "family_members_details";
    protected $guarded=[];

    public function family()
    {
      return $this->belongsTo(House_owner_details::class,'houseownerdetails_id','id');
    }
   
}
