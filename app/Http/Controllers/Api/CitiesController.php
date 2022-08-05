<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\City\StoreCityRequest;
use App\Http\Requests\Api\City\UpdateCityRequest;
use App\Http\Resources\CitiesCollection;
use App\Models\City;
use App\Traits\HandleApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    use HandleApiResponse;

    public function index()
    {
        return $this->successResponse('Cities' , ['City' => CitiesCollection::collection(City::with('entries')->get())] , 'All cities with sentiment fetched');
    }

    public function store(StoreCityRequest $request)
    {

        City::create($request->only('name'));
        return $this->successResponse('data' , [] , 'City is stored successfully');
    }

    public function show(City $city)
    {
        return $this->successResponse('City' , CitiesCollection::make($city) , 'City is fetched successfully');
    }



    public function update(UpdateCityRequest $request, City $city)
    {

        $city->update($request->only('name'));

        return $this->successResponse('data' , [] , 'City is updated successfully');

    }

    public function destroy(City $city)
    {
        DB::transaction(function () use ($city) {
            $city->entries()->delete();
            $city->delete();
        });
        return $this->successResponse('data', [], 'City is deleted successfully');
    }
}
