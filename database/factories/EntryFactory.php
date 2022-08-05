<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Entry;
use App\Traits\Helpers;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntryFactory extends Factory
{

    protected $model = Entry::class;

    public function definition(): array
    {

        $cityName = $this->faker->city;
        $city = City::firstOrCreate(['name' => $cityName]);


        return [
            'message' => $this->faker->text(50) .", " . $this->faker->city,
            'sentiment' => $this->faker->randomElement(['Negative', 'Positive', 'Neutral']),
            'city_id' => $city->id
        ];
    }
}
