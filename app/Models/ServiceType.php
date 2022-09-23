<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    use HasFactory;
    protected $table = 'service_types';
     public $timestamps = false;
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'ServiceTypeId',
         'ServiceName'
     ];
}
