<?php

namespace App\Repositories;

use App\Models\Patient;
use App\Interfaces\PatientInterface;
use App\Http\Resources\PatientResource;

class PatientRepository implements PatientInterface
{

    public function index()
    {
        $patients = Patient::get();
        return response()->json([
            'patients' => PatientResource::collection($patients),
        ], 200);
    }

    public function store($request)
    {
        $patient = Patient::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $request->password,
            'date_birth' => $request->date_birth,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'status' => $request->status,
        ]);
        if (!$patient) {
            return response()->json([
                'message' => 'Failed to create patient please try again',
            ], 500);
        }
        return response()->json([
            'patient' => new PatientResource($patient),
        ], 201);
    }

    public function update($id, $request)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json([
                'message' => 'Patient not found',
            ], 404);
        }
        $patient->update([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => $request->password,
            'date_birth' => $request->date_birth,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'status' => $request->status,
        ]);
        return response()->json([
            'patient' => new PatientResource($patient),
        ], 200);
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json([
                'message' => 'Patient not found',
            ], 404);
        }
        $patient->delete();
        return response()->json([
            'message' => 'Patient deleted successfully',
        ], 200);
    }
}
