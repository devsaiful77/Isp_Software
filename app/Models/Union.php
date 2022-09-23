<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model{
    use HasFactory;
    public $timestamps = false;

    public function upazila(){
        return $this->hasOne('App\Models\Upazila','upazilaId','upazilaId');
    }
}
