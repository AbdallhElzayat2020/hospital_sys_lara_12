<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Repositories\AmbulanceRepository;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{

    protected AmbulanceRepository $ambulanceRepository;

    public function __construct(AmbulanceRepository $ambulanceRepository)
    {
        $this->ambulanceRepository = $ambulanceRepository;
    }

    public function index()
    {
        return $this->ambulanceRepository->index();
    }

    public function store(Request $request)
    {
        return $this->ambulanceRepository->store($request);
    }


    public function update(Request $request, string $id)
    {
        return $this->ambulanceRepository->update($id, $request);
    }

    public function destroy(string $id)
    {
        return $this->ambulanceRepository->destroy($id);
    }
}
