<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run()
    {
        $cities = ['Cairo' , 'Dubai' , 'New York' , 'Nairobi' , 'Jeddah'];

        foreach ($cities as $city){
            City::create([
                'name' => $city
            ]);
        }

        City::factory()->count(5)->create();
    }
}
