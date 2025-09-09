<?php

namespace App\Repositories;

use App\Http\Resources\SectionResource;
use App\Interfaces\SectionInterface;
use App\Models\Section;

class SectionRepository implements SectionInterface
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $sections = Section::all();

        if (!$sections) {
            return response()->json([
                'message' => 'No sections found',
            ], 401);
        }

        return response()->json([
            'sections' => SectionResource::collection($sections)
        ]);
    }

    public function store($request): \Illuminate\Http\JsonResponse
    {

        $section = Section::create([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Section created successfully',
        ], 201);
    }

    public function update($id, $request): \Illuminate\Http\JsonResponse
    {
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
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
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
    }

    public function getSectionsWithDoctors(): \Illuminate\Http\JsonResponse
    {
        $sections = Section::with(['doctors.image', 'doctors.appointments'])->get();

        if ($sections->isEmpty()) {
            return response()->json([
                'message' => 'No sections found',
            ], 404);
        }

        return response()->json([
            'sections' => SectionResource::collection($sections)
        ], 200);
    }
}
