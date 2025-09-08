<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\DoctorRepository;
use App\Http\Requests\Admin\Doctor\StoreDoctorRequest;
use App\Http\Requests\Admin\Doctor\UpdateDoctorRequest;

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

    public function store(StoreDoctorRequest $request)
    {
        return $this->doctorRepository->store($request);
    }
    public function update(UpdateDoctorRequest $request, string $id)
    {
        return $this->doctorRepository->update($id, $request);
    }

    public function destroy(string $id)
    {
        return $this->doctorRepository->destroy($id);
    }
}
