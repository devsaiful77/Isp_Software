<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageInfo extends Model
{
    use HasFactory;
    protected $table = 'package_infos';
     public $timestamps = false;
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'packageId',
         'packageName',
         'bandwidth',
         'price',
         'packageCode',
         'serviceTypeId'
     ];


    // public function serviceType(){
    //     return $this->belongsTo('App\Models\ServiceType');
    // }

    public function ServiceType(){
        return $this->hasOne('App\Models\ServiceType','serviceTypeId','serviceTypeId');
    }

}
