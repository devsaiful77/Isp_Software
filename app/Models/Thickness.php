<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thickness extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function cateInfo(){
        return $this->belongsTo(Category::class, 'CateId', 'CateId');
    }

    public function brandInfo(){
        return $this->belongsTo(Brand::class, 'BranId', 'BranId');
    }

    public function sizeInfo(){
        return $this->belongsTo(Size::class, 'SizeId', 'SizeId');
    }
}
