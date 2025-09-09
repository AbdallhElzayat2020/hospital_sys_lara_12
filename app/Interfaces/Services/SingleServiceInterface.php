<?php

namespace App\Interfaces\Services;

interface SingleServiceInterface
{
    public function index();

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
