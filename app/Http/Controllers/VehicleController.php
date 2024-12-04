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
        $vehicles = Vehicle::paginate(10);

        return new VehicleCollection($vehicles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $validateData = $request->validate([
            'model' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'company' => 'required|string|max:255',
        ]);

        $vehicle = Vehicle::create($validateData);

        return response(new VehicleResource($vehicle), 201);
    }

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
     * @param Vehicle $vehicle
     * @return Response
     */
    public function update(Request $request, Vehicle $vehicle): Response
    {
        $validateData = $request->validate([
            'model' => 'sometimes|required|string|max:255',
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'company' => 'sometimes|required|string|max:255',
        ]);

        $vehicle->update($validateData);

        return response(new VehicleResource($vehicle), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vehicle $vehicle
     * @return Response
     */
    public function destroy(Vehicle $vehicle): Response
    {
        $vehicle->delete();

        return response(null, 204);
    }
}
