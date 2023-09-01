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
        'name' => "Fábio Camargo",
        'email' => "fabiorcamargo@gmail.com",
        'phone' => '42991622889',
        'password' => Hash::make("277888")
    ]);
    
}
}
