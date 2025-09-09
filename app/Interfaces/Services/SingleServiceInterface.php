<?php

namespace App\Interfaces\Services;

interface ServiceInterface
{
    public function index();

    public function store($request);

    public function update($id, $request);

    public function destroy($id);
}
