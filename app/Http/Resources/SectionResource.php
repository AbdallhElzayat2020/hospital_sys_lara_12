<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var \App\Models\Section $this */
        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name', app()->getLocale()) ?? '',
            'doctors' => $this->whenLoaded('doctors', function () {
                return DoctorResource::collection($this->doctors);
            }),
        ];
    }
}
