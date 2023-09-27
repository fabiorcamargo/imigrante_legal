<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            //PageTypeSeeder::class,
            //StatesSeed::class,
            //CitiesSeed::class
            //UserSeeder::class
            //UserResumeSeeder::class

            RegionTableSeeder::class,
            StateTableSeeder::class,
            CityTableSeeder::class,
            CodePremiumSeed::class,
            Roles::class,
            UserSeeder::class,
            SiteConfigSeed::class,
            RoleAssing::class,

        ]);
    }
}
