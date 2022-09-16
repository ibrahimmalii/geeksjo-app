<?php

namespace App\Http\Controllers;

use App\Http\Requests\Area\UpdateAreaRequest;
use App\Http\Requests\Area\StoreAreaRequest;
use App\Models\Area;
use Illuminate\Http\Response;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response(['Areas' => Area::all(['id', 'city_id', 'name', 'slug', 'created_at'])], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAreaRequest $areaRequest
     * @return Response
     */
    public function store(StoreAreaRequest $areaRequest): Response
    {
        $area = Area::create($areaRequest->validated());
        return response(['area' => $area], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Area $area
     * @return Response
     */
    public function show(Area $area): Response
    {
        return response(['area' => $area], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAreaRequest $updateAreaRequest
     * @param Area $area
     * @return Response
     */
    public function update(UpdateAreaRequest $updateAreaRequest, Area $area): Response
    {
        $area->update($updateAreaRequest->validated());
        return response(['area', $area], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Area $area
     * @return Response
     */
    public function destroy(Area $area): Response
    {
        $area->delete();
        return response(['msg' => 'area deleted successfully'], 200);
    }
}
