<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Http\Controllers\Service\CustomerInfoService;

class CustomerExport implements FromCollection,WithHeadings{

    protected $connection_statusId;
    protected $packageId;

    function __construct($connection_statusId, $packageId) {
        $this->connectionStatusId = $connection_statusId;
        $this->packageId = $packageId;
    }

    public function headings():array{
        return[
            'Customer ID',
            'Customer Name',
            'Father Name',
            'Email',
            'Application Date',
            'Phone No One',
            'Phone No Two',
            'Connection Date',
            'Type Of Connection',
            'Type Of Connectivity',
            'Connection Status',
            'Customer Occupation',
            'Service Type',
            'Package',
            'Division',
            'District',
            'Upazila',
            'Union',
            'Service Area',
            'Service Sub Area',
            'Pop Address',
            'Description',
            'Post Code',
            'Road No',
            'House No',
            'Floor No',
            'Plate No',
            'NID'
        ];
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){
        //return Customer::all();
        $customerList = (new CustomerInfoService())->getCustomerList($this->connectionStatusId,$this->packageId);

        return collect($customerList);
    }
}
