<?php

namespace App\Repositories;

use App\Models\Ambulance;
use App\Interfaces\AmbulanceInterface;
use App\Http\Resources\AmbulanceResource;

class AmbulanceRepository implements AmbulanceInterface
{
    public function index()
    {
        $ambulances = Ambulance::paginate();
        if (!$ambulances) {
            return response()->json([
                'status' => 404,
                'message' => 'No ambulances found'
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'ambulances' => AmbulanceResource::collection($ambulances),
        ], 200);
    }

    public function store($request)
    {
        $ambulance = Ambulance::create([
            'driver_name' => $request->driver_name,
            'car_number' => $request->car_number,
            'car_model' => $request->car_model,
            'car_year_made' => $request->car_year_made,
            'driver_license_number' => $request->driver_license_number,
            'driver_phone' => $request->driver_phone,
            'status' => $request->active,
            'car_type' => $request->car_type,
            'notes' => $request->notes,
        ]);
        return response()->json([
            'status' => 201,
            'message' => 'Ambulance created successfully',
            'ambulance' => new AmbulanceResource($ambulance),
        ], 201);
    }

    public function update($id, $request)
    {
        $ambulance = Ambulance::find($id);
        if (!$ambulance) {
            return response()->json([
                'status' => 404,
                'message' => 'No ambulance found'
            ], 404);
        }
        $ambulance->update([
            'driver_name' => $request->driver_name,
            'car_number' => $request->car_number,
            'car_model' => $request->car_model,
            'car_year_made' => $request->car_year_made,
            'driver_license_number' => $request->driver_license_number,
            'driver_phone' => $request->driver_phone,
            'status' => $request->active,
            'car_type' => $request->car_type,
            'notes' => $request->notes,
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Ambulance updated successfully',
            'ambulance' => new AmbulanceResource($ambulance),
        ], 200);
    }

    public function destroy($id)
    {
        $ambulance = Ambulance::find($id);
        if (!$ambulance) {
            return response()->json([
                'status' => 404,
                'message' => 'No ambulance found'
            ], 404);
        }
        $ambulance->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Ambulance deleted successfully',
        ], 200);
    }
}
