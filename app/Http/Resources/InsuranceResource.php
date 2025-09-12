<?php

namespace App\Http\Resources;

use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InsuranceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* @var Insurance $this */
        return [
            'id' => $this->id,
            'insurance_name' => $this->insurance_name,
            'notes' => $this->notes,
            'insurance_percentage' => $this->insurance_percentage,
            'insurance_code' => $this->insurance_code,
            'phone' => $this->phone,
            'email' => $this->email,
            'description' => $this->description,
            'status' => $this->status,
            'joined_date' => $this->created_at?->format('Y-m-d'),
        ];
    }
}
