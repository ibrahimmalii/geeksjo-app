<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Models\Country;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response(['countries' => Country::all(['id', 'name', 'slug', 'created_at'])], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCountryRequest $countryRequest
     * @return Response
     */
    public function store(StoreCountryRequest $countryRequest): Response
    {
        $country = Country::create($countryRequest->validated());
        return response(['country' => $country], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Country $country
     * @return Response
     */
    public function show(Country $country): Response
    {
        return response(['country' => $country], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCountryRequest $updateCountryRequest
     * @param Country $country
     * @return Response
     */
    public function update(UpdateCountryRequest $updateCountryRequest, Country $country): Response
    {
        $country->update($updateCountryRequest->validated());
        return response(['country', $country], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Country $country
     * @return Response
     */
    public function destroy(Country $country): Response
    {
        $country->delete();
        return response(['msg' => 'country deleted successfully'], 200);
    }

    /**
     * Get related cities
     *
     * @param Country $country
     * @return Response|Application|ResponseFactory
     */
    public function cities(Country $country): Response|Application|ResponseFactory
    {
        return response(['cities'=> $country->cities()->get()], 200);
    }
}
