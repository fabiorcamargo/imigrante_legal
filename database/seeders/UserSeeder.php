<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    User::create([
        'name' => env('USER_NAME'),
        'email' => env('USER_EMAIL'),
        'phone' => env('USER_PH'),
        'password' => Hash::make(env('USER_PW'))
    ]);
    
}
}
