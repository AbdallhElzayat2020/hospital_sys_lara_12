<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var Patient $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
            'password' => $this->password,
            'date_birth' => $this->date_birth,
            'phone' => $this->phone,
            'gender' => $this->gender,
            'blood_group' => $this->blood_group,
            'status' => $this->status,
            'joined_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
