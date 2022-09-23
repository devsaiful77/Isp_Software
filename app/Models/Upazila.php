<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model{
    use HasFactory;
    protected $table = 'upazilas';
    public $timestamps = false;
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'upazilaName',
         'districtId'
     ];

    public function district(){
        return $this->hasOne('App\Models\District','districtId','districtId');
    }
}
 