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

    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->insuranceRepository->index();
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        // validate Request
        return $this->insuranceRepository->store($request);
    }

    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        // validate Request
        return $this->insuranceRepository->update($id, $request);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        return $this->insuranceRepository->destroy($id);
    }
}
