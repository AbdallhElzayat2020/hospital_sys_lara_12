<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    protected DoctorRepository $doctorRepository;

    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        return $this->doctorRepository->index();
    }

    public function store(Request $request)
    {
        // validate request
        return $this->doctorRepository->store($request);
    }


    public function update(Request $request, string $id)
    {
        // validate request
        return $this->doctorRepository->update($id, $request);
    }


    public function destroy(string $id)
    {
        return $this->doctorRepository->destroy($id);
    }
}
