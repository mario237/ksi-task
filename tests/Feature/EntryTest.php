<?php

namespace Feature;

use App\Models\Entry;
use App\Traits\Helpers;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EntryTest extends TestCase
{

    use RefreshDatabase;

    public function test_get_all_entries(): void
    {
        $response = $this->get(route('entries.index'));

        $response->assertStatus(200);
    }


    public function test_create_new_entry_with_empty_body() :void{
        $response = $this->json('POST' , route('entries.store') , []);

        $response->assertStatus(422);
    }


    public function test_create_new_entry() :void{

       $entry = Entry::factory()->count(1)->create()->first();

        $response = $this->json('POST' , route('entries.store') , [
            'message' => $entry->message,
            'sentiment' => $entry->sentiment,
            'city_id' => $entry->city_id
        ]);

        $response->assertStatus(200);
    }

    public function test_show_entry_details_by_id():void{
        $entry = Entry::factory()->count(1)->create()->first();

        $response = $this->json('GET' , route('entries.show' , $entry));
        $response->assertStatus(200);
    }


    public function test_try_to_show_entry_details_not_found():void{
        $response = $this->json('GET' , route('entries.show' , 100));
        $response->assertStatus(404);
    }


    public function test_update_entry_details_by_id():void{
        $entry = Entry::factory()->count(1)->create()->first();

        $response = $this->json('PUT' , route('entries.update' , $entry) , [
            'message' => 'message updated',
            'sentiment' => 'sentiment updated'
        ]);
        $response->assertStatus(200);
    }

    public function test_try_to_update_entry_details_not_found():void{
        $response = $this->json('PUT' , route('entries.update' , 100) , [
            'message' => 'message updated',
            'sentiment' => 'sentiment updated'
        ]);
        $response->assertStatus(404);
    }


    public function test_delete_entry_details_by_id():void{
        $entry = Entry::factory()->count(1)->create()->first();

        $response = $this->json('DELETE' , route('entries.destroy' , $entry));
        $response->assertStatus(200);
    }

    public function test_try_to_delete_entry_details_not_found():void{
        $response = $this->json('DELETE' , route('entries.destroy' , 100));
        $response->assertStatus(404);
    }


}
