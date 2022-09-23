<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;

    protected $table = 'payment_infos';
     public $timestamps = false;
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'customerId',
         'amount',
         'paymentTypeId',
         'paymentDate',
         'collectedById',
         'transactionNo',
         'payMonth'
     ];


    public function customer(){
        return $this->hasOne('App\Models\Customer','customerAutoId','customerId');
    }

    public function month(){
        return $this->hasOne('App\Models\Month','month_id','payMonth');
    }

    public function user(){
        return $this->hasOne('App\Models\User','id','collectedById');
    }
}

 