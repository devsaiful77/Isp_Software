<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    use HasFactory;
    public $timestamps = false;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customerID',
        'customerName',
        'fatherName',
        'email',
        'applicationDate',
        'phoneNo1',
        'phoneNo2',
        'connectionDate',
        'type_of_connection_id',
        'type_of_connectivity_id',
        'connectionStatusId',
        'customerOccupationId',
        'serviceTypeId',
        'packageId',
        'divisionId',
        'districtId',
        'upazilaId',
        'unionId',
        'serviceAreaId',
        'serviceSubAreaId',
        'pop_id',
        'description',
        'postCode',
        'roadNo',
        'houseNo',
        'floorNo',
        'plateNo',
        'nid'
    ];

    public function upazila(){
        return $this->hasOne('App\Models\Upazila','upazilaId','upazilaId');
    }

    public function union(){
        return $this->hasOne('App\Models\Union','unionId','unionId');
    }

}

 