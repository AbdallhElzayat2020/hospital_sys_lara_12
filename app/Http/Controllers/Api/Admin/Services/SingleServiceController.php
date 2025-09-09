<?php

namespace App\Http\Controllers\Api\Admin\Services;

use App\Http\Controllers\Controller;
use App\Repositories\Services\SingleServiceRepository;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{
    protected SingleServiceRepository $serviceRepository;

    public function __construct(SingleServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->serviceRepository->index();
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        return $this->serviceRepository->store($request);
    }

    public function update(Request $request, string $id): \Illuminate\Http\JsonResponse
    {
        return $this->serviceRepository->update($id, $request);
    }

    public function destroy(string $id): \Illuminate\Http\JsonResponse
    {
        return $this->serviceRepository->destroy($id);
    }
}
