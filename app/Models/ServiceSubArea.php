<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubArea extends Model{
    use HasFactory;
    public $timestamps = false;


    public function serviceArea(){
        return $this->hasOne('App\Models\ServiceArea','serviceAreaId','serviceAreaId');
    }


}
