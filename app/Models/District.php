<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model{
    use HasFactory;
 
    protected $table = 'districts';
     public $timestamps = false;
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'districtName',
         'divisionId'
     ];

    public function division(){
        return $this->hasOne('App\Models\Division','divisionId','divisionId');
    }

         
}
