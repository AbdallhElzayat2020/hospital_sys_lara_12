<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SectionResource;
use App\Repositories\SectionRepository;

class SectionController extends Controller
{

    protected SectionRepository $sectionRepository;

    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function index()
    {
        return $this->sectionRepository->index();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $section = Section::create([
            'name' => $request->input('name'),
        ]);

        return response()->json([
            'message' => 'Section created successfully',
            'section' => new SectionResource($section)
        ], 201);
    }


    public function update(Request $request, string $id)
    {
        return $this->sectionRepository->update($id, $request);
    }


    public function destroy(string $id)
    {
        return $this->sectionRepository->destroy($id);
    }

    public function getSectionsWithDoctors()
    {
        return $this->sectionRepository->getSectionsWithDoctors();
    }
}
