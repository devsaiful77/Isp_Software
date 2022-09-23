<?php

namespace Database\Seeders;

use App\Models\PopAddress;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PopAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ==== Do Work ==== */
        PopAddress::truncate();
        $popAddress = [
            [
                'pop_name' => 'Saiful Islam',
                'pop_email' => 'saiful@gmail.com',
                'pop_phone' => '01920778264',
                'pop_address' => 'Saver Dhaka',
                'pop_status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'pop_name' => 'Maizul Alom',
                'pop_email' => 'maizul@gmail.com',
                'pop_phone' => '019203900093',
                'pop_address' => 'Saver Dhaka',
                'pop_status' => 1,
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($popAddress as $key => $value) {
            PopAddress::create($value);
        }
        /* ==== Do Work ==== */
    }
}
