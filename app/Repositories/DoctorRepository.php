<?php

namespace App\Repositories;

use App\Http\Resources\DoctorResource;
use App\Interfaces\DoctorInterface;
use App\Models\Doctor;

class DoctorRepository implements DoctorInterface
{
    public function index()
    {
        $doctors = Doctor::with('image')->paginate();
        if (!$doctors) {
            return response()->json([
                'message' => 'No doctors found',
            ], 404);
        }
        return response()->json([
            'doctors' => DoctorResource::collection($doctors),
        ], 200);
    }

    public function store($request)
    {

    }

    public function update($id, $request)
    {

    }

    public function destroy($id)
    {

    }
}
