<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model{
    use HasFactory;

    public function month(){
        return $this->hasOne('App\Models\Month','month_id','month_id');
    }
}
