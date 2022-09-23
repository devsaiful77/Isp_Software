<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    public $timestamps = false;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EmployeeName',
        'FatherName',
        'EmpEmail',
        'PhoneNo1',
        'PhoneNo2',
        'JoinDate',
        'DesignationId',
        'DivisionId',
        'DistrictId',
        'UpazilaId',
        'Village',
        'PostOffice',
        'Details',
        'ServiceAreaId',
        'Photo',
        'NID', 
        'IsActive',
    ];

}

 