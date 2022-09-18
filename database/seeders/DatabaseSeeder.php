<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        $countries = Country::factory(3)->create();

        foreach ($countries as $country)
        {
            City::factory(2)->create([
                'country_id' => $country->id
            ]);
        }

        $citiesIds = City::all('id');
        foreach ($citiesIds as $id)
        {
            Area::factory(5)->create([
                'city_id' => $id
            ]);
        }

    }
}
