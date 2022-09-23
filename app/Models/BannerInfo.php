<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerInfo extends Model
{
    use HasFactory;
    protected $table = 'banner_infos';
    public $timestamps = false;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bannerName',
        'bannerTitle',
        'bannerSubTitle',
        'bannerUrl',
        'isActive'
    ];
 
}
