<?php

namespace Database\Seeders;

use App\Models\CodePremium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CodePremiumSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        CodePremium::insert([
            'code' => '12345',
            'seller' => "Fábio",
            'token' => (string)Str::uuid()
        ]);
    }
}