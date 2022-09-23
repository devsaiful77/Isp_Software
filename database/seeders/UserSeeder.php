<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* ==== Do Work ==== */
        User::truncate();
        $user = [
            [
                'name' => 'Admin',
                'role_id' => '1',
                'pop_id' => '1',
                'email' => 'admin@gmail.com',
                'phone' => '123456789',
                'password' => Hash::make('123456'),
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin2',
                'role_id' => '1',
                'pop_id' => '1',
                'email' => 'admin2@gmail.com',
                'phone' => '123456788',
                'password' => Hash::make('123456'),
                'status' => 1,
                'created_at' => Carbon::now(),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
        /* ==== Do Work ==== */
    }
}
