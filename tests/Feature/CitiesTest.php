<?php

namespace Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitiesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_cities(): void
    {
        $response = $this->get(route('cities.index'));

        $response->assertStatus(200);
    }


    public function test_create_new_city_with_empty_body() :void{
        $response = $this->json('POST' , route('cities.store') , []);

        $response->assertStatus(422);
    }


    public function test_create_new_city() :void{

        $city = City::factory()->count(1)->make()->first();

        $response = $this->json('POST' , route('cities.store') , ['name' => $city->name]);


        $response->assertStatus(200);

    }


    public function test_show_city_details_by_id():void{
        $city = City::factory()->count(1)->create()->first();

        $response = $this->json('GET' , route('cities.show' , $city));
        $response->assertStatus(200);

    }



    public function test_try_to_show_city_details_not_found():void{
        $response = $this->json('GET' , route('cities.show' , 100));
        $response->assertStatus(404);
    }


    public function test_update_city_details_by_id():void{
        $city = City::factory()->count(1)->create()->first();

        $response = $this->json('PUT' , route('cities.update' , $city) , ['name' => 'City Updated']);
        $response->assertStatus(200);
    }

    public function test_try_to_update_city_details_not_found():void{
        $response = $this->json('PUT' , route('cities.update' , 100) , ['name' => 'City Updated']);
        $response->assertStatus(404);
    }


    public function test_delete_city_details_by_id():void{
        $city = City::factory()->count(1)->create()->first();
        $response = $this->json('DELETE' , route('cities.destroy' , $city));
        $response->assertStatus(200);
    }

    public function test_try_to_delete_city_details_not_found():void{
        $response = $this->json('DELETE' , route('cities.destroy' , 100));
        $response->assertStatus(404);
    }

}
