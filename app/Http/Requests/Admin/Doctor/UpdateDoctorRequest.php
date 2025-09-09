<?php

namespace App\Http\Requests\Admin\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('doctor');
        return [
            'name' => 'sometimes|string',
            'email' => 'sometimes|email|unique:doctors,email,' . $id,
            'phone' => 'sometimes|string',
            'password' => 'sometimes|nullable|min:6',
            'price' => 'sometimes|numeric',
            'section_id' => 'sometimes|exists:sections,id',
            'status' => 'sometimes|in:active,inactive',
            'appointments' => 'sometimes',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg|max:3000',
        ];
    }
}
