<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherIncome extends Model{
    use HasFactory;

    public function drVoucher(){
        return $this->hasOne('App\Models\DrebitType','drTypeId','drTypeId');
    }
}
