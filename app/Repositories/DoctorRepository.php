<?php

namespace App\Repositories;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Traits\HandleFileTrait;
use Illuminate\Support\Facades\DB;
use App\Interfaces\DoctorInterface;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\DoctorResource;
use Illuminate\Testing\Fluent\Concerns\Has;

class DoctorRepository implements DoctorInterface
{
    use HandleFileTrait;

    public function index(): \Illuminate\Http\JsonResponse
    {
        $doctors = Doctor::with(['image', 'appointments'])->get();

        if (!$doctors) {
            return response()->json([
                'message' => 'No doctors found',
            ], 404);
        }

        return response()->json([
            'doctors' => DoctorResource::collection($doctors),
        ], 200);
    }

    public function store($request): \Illuminate\Http\JsonResponse
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
            ]);

            // Attach appointments to pivot table
            $doctor->appointments()->attach($request->appointments);

            $this->uploadFile($request, 'image', 'doctors', 'uploads', $doctor);

            DB::commit();

            // Load the appointments relationship before returning
            $doctor->load('appointments');

            return response()->json([
                'message' => 'Doctor created successfully',
                'doctor' => DoctorResource::make($doctor),
            ], 201);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json([
                'message' => 'Something went wrong please try again',
                'error' => $th->getMessage(),
            ], 401);
        }
    }

    public function update($id, $request)
    {


        $doctor = Doctor::with(['appointments'])->find($id);

        if (!$doctor) {
            return response()->json([
                'message' => 'Doctor not found',
            ], 404);
        }

        $updateData = $request->only(['name', 'email', 'phone', 'price', 'section_id', 'status']);

        if (!empty($updateData)) {
            $doctor->update($updateData);
        }

        if ($request->has('appointments')) {
            $doctor->appointments()->sync($request->appointments);
        }

        if ($request->filled('password')) {
            $doctor->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if ($request->hasFile('image')) {
            $this->deleteImage($doctor, 'uploads');
            $this->uploadFile($request, 'image', 'doctors', 'uploads', $doctor);
        }

        // Reload the doctor with appointments
        $doctor->load('appointments');

        return response()->json([
            'message' => 'Doctor updated successfully',
            'doctor' => DoctorResource::make($doctor),
        ], 200);
    }

    public function changeStatus($id): \Illuminate\Http\JsonResponse
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json([
                'message' => 'Doctor not found',
            ], 404);
        }

        if ($doctor->status == 'active') {
            $doctor->status = 'inactive';
        } else {
            $doctor->status = 'active';
        }

        return response()->json([
            'message' => 'Doctor status changed successfully',
            'status' => $doctor->status,
        ], 200);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
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
