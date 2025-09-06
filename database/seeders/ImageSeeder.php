<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have doctors before creating images
        if (Doctor::count() === 0) {
            Doctor::factory()->count(15)->create();
        }

        Image::factory()->count(15)->create();
    }
}
