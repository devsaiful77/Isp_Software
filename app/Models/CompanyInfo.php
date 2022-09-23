<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $table = 'company_infos';
    public $timestamps = false;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ComNameBangla',
        'ComNameEnlish',
        'CompanyTitle',
        'CompanySubTitle',
        'Address',
        'OwnerName1',
        'OwnerPhoto1',
        'OwnerName2',
        'OwnerPhoto2',
        'MobileNo1',
        'MobileNo2',
        'Email1',
        'Email2',
        'SupportMobileNumber',
        'Description',
        'CompanyMission',
        'CompanyVission',
        'WebAddress',
        'TradeLicense',
        'ISPLicense', 
        'Logo',
        'Extra1',
        'Extra2',
        'Extra3', 
        
    ];
}  
