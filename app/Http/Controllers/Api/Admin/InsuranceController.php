<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\InsuranceRepository;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{

    protected InsuranceRepository $insuranceRepository;

    public function __construct(InsuranceRepository $insuranceRepository)
    {
        $this->insuranceRepository = $insuranceRepository;
    }

    public function index()
    {
        return $this->insuranceRepository->index();
    }

    public function store(Request $request)
    {
        return $this->insuranceRepository->store($request);
    }

    public function update(Request $request, string $id)
    {
        return $this->insuranceRepository->update($id, $request);
    }

    public function destroy(string $id)
    {
        return $this->insuranceRepository->destroy($id);
    }
}
