<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'max:200', 'email'],
            'password' => ['required', 'min:8', 'max:100', 'string'],
        ];
    }


//    public function attributes(): array
//    {
//        return [
//            'email' => trans('auth.email'),
//        ];
//    }

//    public function messages(): array
//    {
//        return [
//            'email.email' => 'The email must be a valid email address.',
//            'email.required' => 'The email field is required.',
//            'password.required' => 'The password field is required.',
//        ];
//    }
}
