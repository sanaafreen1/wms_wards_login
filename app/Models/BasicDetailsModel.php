<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicDetailsModel extends Model
{
    use HasFactory;

    protected $table = 'wards_basic_details';
    protected $guarded = [];

    public function ownerdetails()
    {
        return $this->hasOne(House_owner_details::class,'basic_details_id','id')->withcount('familymembers');
    }
}
