<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Entry\EntryRequest;
use App\Http\Resources\EntriesCollection;
use App\Models\City;
use App\Models\Entry;
use App\Traits\HandleApiResponse;
use App\Traits\Helpers;
use Illuminate\Http\Request;


class EntriesController extends Controller
{
    use HandleApiResponse , Helpers;

    public function index()
    {
        return $this->successResponse('Entries', ['Entry' => EntriesCollection::collection(Entry::all())], 'All Entries Fetched');
    }


    public function store(EntryRequest $request)
    {
        $data = $request->all();

        $cityName = $this->getCityNameFromWords(explode(", " , $data['message']));

        $city = City::firstOrCreate(['name' => $cityName]);

        $data['city_id'] = $city->id;

        Entry::create($data);

        return $this->successResponse('data', [], 'Entry is stored successfully');


    }

    public function show(Entry $entry)
    {
        return $this->successResponse('Entry', EntriesCollection::make($entry), 'Entry is fetched successfully');
    }

    public function update(EntryRequest $request, Entry $entry)
    {

        $data = $request->all();

        $entry->update($data);

        return $this->successResponse('data', [], 'Entry is updated successfully');
    }

    public function destroy(Entry $entry)
    {
        $entry->delete();
        return $this->successResponse('data', [], 'Entry is deleted successfully');
    }
}
