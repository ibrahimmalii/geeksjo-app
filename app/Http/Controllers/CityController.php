<?php

namespace App\Http\Controllers;

use App\Http\Requests\City\StoreCityRequest;
use App\Http\Requests\City\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response(['cities' => City::all(['id', 'country_id', 'name', 'slug', 'created_at'])], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCityRequest $cityRequest
     * @return Response
     */
    public function store(StoreCityRequest $cityRequest): Response
    {
        $city = City::create($cityRequest->validated());
        return response(['city' => $city], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param City $city
     * @return Response
     */
    public function show(City $city): Response
    {
        return response(['city' => $city], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCityRequest $updateCityRequest
     * @param City $city
     * @return Response
     */
    public function update(UpdateCityRequest $updateCityRequest, City $city): Response
    {
        $city->update($updateCityRequest->validated());
        return response(['city', $city], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param City $city
     * @return Response
     */
    public function destroy(City $city): Response
    {
        $city->delete();
        return response(['msg' => 'city deleted successfully'], 200);
    }
}
