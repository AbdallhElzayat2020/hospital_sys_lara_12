<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{

    public function run(): void
    {
        Doctor::factory(15)->create();

        $appointments = Appointment::pluck('id')->all();

        Doctor::all()->each(function (Doctor $doctor) use ($appointments) {
            $doctor->appointments()->attach(
                collect($appointments)->random(rand(1, 7))
            );
        });
    }
}
