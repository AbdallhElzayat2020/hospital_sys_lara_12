<?php

namespace App\Repositories\Services;

use Exception;
use App\Models\Service;
use App\Http\Resources\ServicesResource;
use App\Interfaces\Services\SingleServiceInterface;

class SingleServiceRepository implements SingleServiceInterface
{
    public function index()
    {
        try {
            $services = Service::paginate(10)->withQueryString();

            if (!$services) {
                return response()->json([
                    'message' => 'No services found',
                ], 401);
            }

            return response()->json([
                'services' => ServicesResource::collection($services)->response()->getData(true),
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while fetching services.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function store($request)
    {
        try {
            Service::create([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'status' => $request->status,
            ]);

            return response()->json([
                'message' => 'Service created successfully',
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while creating the service.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update($id, $request)
    {
        try {
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
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while updating the service.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
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
        } catch (Exception $e) {
            return response()->json([
                'message' => 'An error occurred while deleting the service.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
