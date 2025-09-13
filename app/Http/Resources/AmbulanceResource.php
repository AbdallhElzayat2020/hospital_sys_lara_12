<?php

namespace App\Http\Resources;

use App\Models\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AmbulanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var Ambulance $this */
        return [
            'id' => $this->id,
            'driver_name' => $this->driver_name,
            'notes' => $this->notes,
            'car_number' => $this->car_number,
            'car_model' => $this->car_model,
            'status' => $this->status,
            'car_year_made' => $this->car_year_made,
            'driver_license_number' => $this->driver_license_number,
            'driver_phone' => $this->driver_phone,
            'car_type' => $this->car_type,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
