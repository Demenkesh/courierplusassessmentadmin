<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Admin User',
                'email' => 'bigture123@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('courierplus123123123@@@'), // Hash the password
                'remember_token' => Str::random(10),
                'role_as' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
