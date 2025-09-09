<?php

namespace App\Interfaces;

interface DoctorInterface
{
    public function index();

    public function store($request);

    public function update($id, $request);

    public function changeStatus($id);

    public function destroy($id);

    public function getDoctorsBySection($section_id);
}
