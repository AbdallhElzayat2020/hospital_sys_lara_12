<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var \App\Models\Doctor $this */
        return [
            'id' => $this->id,
            'doctor_name' => $this->name,
            'doctor_appointment' => $this->appointments,
            'doctor_email' => $this->email,
            'doctor_phone' => $this->phone,
            'doctor_price' => $this->price,
            'doctor_department' => $this->section->name,
            'image' => $this->image != null ? ImageResource::make(($this->whenLoaded('image'))) : 'no image',
        ];
    }
}
