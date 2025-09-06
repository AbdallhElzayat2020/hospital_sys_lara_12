<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Image::class;
    public function definition(): array
    {
        // Ensure we have at least one doctor before creating images
        $doctors = Doctor::all();
        if ($doctors->isEmpty()) {
            // Create a doctor if none exist
            $doctor = Doctor::factory()->create();
        } else {
            $doctor = $doctors->random();
        }

        return [
            'url' => $this->faker->imageUrl(),
            'imageable_id' => $doctor->id,
            'imageable_type' => 'App\Models\Doctor',
        ];
    }
}