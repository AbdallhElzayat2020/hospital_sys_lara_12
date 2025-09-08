<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Traits\HandleFileTrait;
use Illuminate\Support\Facades\DB;
use App\Interfaces\DoctorInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\DoctorResource;
use Illuminate\Support\Facades\Storage;

class DoctorRepository implements DoctorInterface
{
    use HandleFileTrait;
    public function index()
    {
        $doctors = Doctor::with('image')->get();
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
        try {

            DB::beginTransaction();

            $doctor = Doctor::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'price' => $request->price,
                'section_id' => $request->section_id,
                'status' => $request->status,
                'appointments' => is_array($request->appointments) ? implode(',', $request->appointments) : $request->appointments,
            ]);

            $this->uploadFile($request, 'image', 'doctors', 'uploads', $doctor);

            DB::commit();

            return response()->json([
                'message' => 'Doctor created successfully',
                'doctor' => DoctorResource::make($doctor),
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Doctor not created',
                'error' => $th->getMessage(),
            ], 401);
        }
    }

    public function update($id, $request)
    {

        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json([
                'message' => 'Doctor not found',
            ], 404);
        }

        $updateData = $request->only(['name', 'email', 'phone', 'price', 'section_id', 'status']);

        if ($request->has('appointments')) {
            $updateData['appointments'] = is_array($request->appointments)
                ? implode(',', $request->appointments)
                : $request->appointments;
        }

        if (!empty($updateData)) {
            $doctor->update($updateData);
        }

        if ($request->filled('password')) {
            $doctor->update([
                'password' => Hash::make($request->password),
            ]);
        }

        if ($request->hasFile('image')) {
            $this->deleteImage($doctor, 'uploads');
            $this->uploadFile($request, 'image', 'doctors', 'uploads', $doctor);
        }

        return response()->json([
            'message' => 'Doctor updated successfully',
            'doctor'  => DoctorResource::make($doctor),
        ], 200);
    }



    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json([
                'message' => 'Doctor not found',
            ], 404);
        }

        $this->deleteImage($doctor, 'uploads');

        $doctor->delete();

        return response()->json([
            'message' => 'Doctor deleted successfully',
        ], 200);
    }
}
