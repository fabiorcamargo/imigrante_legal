<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteConfigSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('config_sites')->insert([
           'user_id' => '1',
           'body' => '{
            "banner1": "storage/assets/img/banners/banner1.webp"
        }',
        ]);
    }
}
