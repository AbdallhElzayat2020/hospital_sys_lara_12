<?php

namespace App\Interfaces;

interface AmbulanceInterface
{
    public function index();

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
