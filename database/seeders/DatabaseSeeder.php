<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        if(!User::all()->count()) {
            User::factory()->create([
                'name' => 'ibrahim ali',
                'email' => 'admin@admin.com'
            ]);
        }

        Country::factory(10)->create();
        City::factory(100)->create();
        Area::factory(200)->create();
    }
}
