<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PatientRepository;

class PatientController extends Controller
{
    protected PatientRepository $patientRepository;

    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function index()
    {
        return $this->patientRepository->index();
    }


    public function store(Request $request)
    {
        return $this->patientRepository->store($request);
    }


    public function update(Request $request, string $id)
    {
        return $this->patientRepository->update($id, $request);
    }

    public function destroy(string $id)
    {
        return $this->patientRepository->destroy($id);
    }
}
