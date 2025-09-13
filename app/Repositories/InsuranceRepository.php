<?php

namespace App\Repositories;

use App\Http\Resources\InsuranceResource;
use App\Interfaces\InsuranceInterface;
use App\Models\Insurance;

class InsuranceRepository implements InsuranceInterface
{
    public function index()
    {
        $insurances = Insurance::get();
        if (!$insurances) {
            return response()->json([
                'status' => 404,
                'message' => 'No insurance found'
            ], 404);
        }
        return response()->json([
            'status' => 200,
            'insurances' => InsuranceResource::collection($insurances),
        ], 200);
    }

    public function store($request)
    {
        $insurance = Insurance::create([
            'insurance_name' => $request->insurance_name,
            'description' => $request->description,
            'insurance_percentage' => $request->insurance_percentage,
            'insurance_code' => $request->insurance_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        if (!$insurance) {
            return response()->json([
                'status' => 500,
                'message' => 'Failed to create insurance please try again'
            ], 500);
        }

        return response()->json([
            'status' => 201,
            'message' => 'Insurance created successfully',
            'insurance' => InsuranceResource::make($insurance),
        ], 201);
    }

    public function update($id, $request)
    {

        $insurance = Insurance::find($id);
        if (!$insurance) {
            return response()->json([
                'status' => 404,
                'message' => 'No insurance found'
            ], 404);
        }

        $insurance->update([
            'insurance_name' => $request->insurance_name,
            'description' => $request->description,
            'insurance_percentage' => $request->insurance_percentage,
            'insurance_code' => $request->insurance_code,
            'phone' => $request->phone,
            'email' => $request->email,
            'notes' => $request->notes,
            'status' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Insurance updated successfully',
            'insurance' => InsuranceResource::make($insurance),
        ], 200);
    }

    public function destroy($id)
    {
        $insurance = Insurance::find($id);
        if (!$insurance) {
            return response()->json([
                'status' => 404,
                'message' => 'No insurance found'
            ], 404);
        }

        $insurance->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Insurance deleted successfully',
        ], 200);
    }
}
