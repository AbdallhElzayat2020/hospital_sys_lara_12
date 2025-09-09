<?php

namespace App\Repositories\Services;

use App\Interfaces\Services\ServiceInterface;
use App\Models\Service;

class ServiceRepository implements ServiceInterface
{
    public function index()
    {
        $services = Service::paginate(10);

        if (!$services) {
            return response()->json([
                'message' => 'No services found',
            ], 401);
        }


        return response()->json([
            'services' => $services
        ], 200);
    }

    public function store($request)
    {
        Service::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Service created successfully',
        ], 201);
    }

    public function update($id, $request)
    {
        $service = Service::find($id);

        if (!$service) {
            return response()->json([
                'message' => 'Service not found',
            ], 404);
        }

        $service->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Service updated successfully',
        ], 200);
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if (!$service) {
            return response()->json([
                'message' => 'Service not found',
            ], 404);
        }
        $service->delete();
        return response()->json([
            'message' => 'Service deleted successfully',
        ], 200);
    }
}
