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

            'doctor_email' => $this->email,
            'doctor_phone' => $this->phone,
            'doctor_price' => $this->price,
            'doctor_department' => $this->section->name,
            'status' => $this->status,
            'joined_at' => $this->created_at->format('Y-m-d H:i A'),
            'image' => $this->image != null ? ImageResource::make(($this->whenLoaded('image'))) : 'no image',
            'doctor_appointment' => $this->appointments != null ? AppointmenResource::collection($this->whenLoaded('appointments')) : 'no appointments for this doctor',

        ];
    }
}
