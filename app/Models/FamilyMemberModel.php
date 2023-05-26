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

}
