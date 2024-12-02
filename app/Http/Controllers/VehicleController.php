<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\VehicleCollection;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return VehicleCollection
     */
    public function index(): VehicleCollection
    {
        $vehicles = Vehicle::where('id', '>', 0);

        $collection = new VehicleCollection($vehicles->paginate(10));

        return $collection->preserveQuery();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {}

    /**
     * Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @return VehicleResource
     */
    public function show(Vehicle $vehicle): VehicleResource
    {
        return new VehicleResource($vehicle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {}
}
