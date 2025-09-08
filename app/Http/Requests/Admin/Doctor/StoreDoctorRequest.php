<?php

namespace App\Http\Requests\Admin\Doctor;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required', // make it unique later
            'email' => 'required|email|unique:doctors,email',
            'phone' => 'required', // make it unique later
            'password' => 'required|min:6', // make it min 8 later
            'price' => 'required',
            'section_id' => 'required|exists:sections,id',
            'status' => 'required|in:active,inactive',
            'appointments' => 'required', // will make it the appointment day later
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3000',
        ];
    }
}
