<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseRecord extends Model{
    use HasFactory;
    protected $primaryKeys = 'pr_record_id';

    public function itemType(){
      return $this->belongsTo('App\Models\ItemType','itype_id','itype_id');
    }

    public function itemCatg(){
      return $this->belongsTo('App\Models\ItemCategory','icatg_id','icatg_id');
    }

    public function itemSubCatg(){
      return $this->belongsTo('App\Models\ItemSubCategory','iscatg_id','iscatg_id');
    }

}
