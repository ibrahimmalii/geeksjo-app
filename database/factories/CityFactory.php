<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cityName = fake()->unique()->city();
        return [
            'country_id' => Country::pluck('id')->random(),
            'name' => $cityName,
            'slug' => str()->slug($cityName)
        ];
    }
}
