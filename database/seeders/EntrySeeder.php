<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    public function run()
    {

        $entries = [
            ["message" => "It is very hot in, Cairo", "sentiment" => "Neutral" , "city_id" => 1],
            ["message" => "There is new project started in, Nairobi", "sentiment" => "Positive" , "city_id" => 4],
            ["message" => "Dubai EXPO 2020 will create a new image for the middle, Dubai", "sentiment" => "Positive" , "city_id" => 2],
            ["message" => "I hate black people, there are so many of them in, New York", "sentiment" => "Negative" , "city_id" => 3],
            ["message" => "Do you COVID Vaccine, Jeddah, is good?", "sentiment" => "Negative" , "city_id" => 5],
        ];

        foreach ($entries as $entry) {
            Entry::create([
               'message' => $entry['message'],
               'sentiment' => $entry['sentiment'],
               'city_id' => $entry['city_id']
            ]);
        }

        Entry::factory()->count(5)->create();
    }
}
