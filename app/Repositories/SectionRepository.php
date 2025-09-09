<?php

namespace App\Repositories;

use App\Http\Resources\SectionResource;
use App\Interfaces\SectionInterface;
use App\Models\Section;

class SectionRepository implements SectionInterface
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $sections = Section::all();

            if (!$sections) {
                return response()->json([
                    'message' => 'No sections found',
                ], 401);
            }

            return response()->json([
                'sections' => SectionResource::collection($sections)
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong, please try again',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function store($request): \Illuminate\Http\JsonResponse
    {
        try {
            Section::create([
                'name' => $request->input('name'),
            ]);

            return response()->json([
                'message' => 'Section created successfully',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong, please try again',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function update($id, $request): \Illuminate\Http\JsonResponse
    {
        try {
            $section = Section::find($id);

            $request->validate([
                'name' => 'required',
            ]);

            if (!$section) {
                return response()->json([
                    'message' => 'Section not found',
                ], 401);
            }

            $section->update([
                'name' => $request->input('name'),
            ]);

            return response()->json([
                'message' => 'Section updated successfully',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong, please try again',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        try {
            $section = Section::find($id);
            if (!$section) {
                return response()->json([
                    'message' => 'Section not found',
                ], 401);
            }
            $section->delete();
            return response()->json([
                'message' => 'Section deleted successfully',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong, please try again',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function getSectionsWithDoctors(): \Illuminate\Http\JsonResponse
    {
        try {
            $sections = Section::with(['doctors.image', 'doctors.appointments'])->get();

            if ($sections->isEmpty()) {
                return response()->json([
                    'message' => 'No sections found',
                ], 404);
            }

            return response()->json([
                'sections' => SectionResource::collection($sections)
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Something went wrong, please try again',
                'error' => $th->getMessage(),
            ], 500);
        }
    }
}
