<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectionInfo extends Model
{
    use HasFactory;

    protected $table = 'connection_infos';
     public $timestamps = false;
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'ipAddress',
         'userId',
         'userPassword',
         'description'
     ];



    public function customer(){
        return $this->hasOne('App\Models\Customer','customerAutoId','customerId');
    }
}
 