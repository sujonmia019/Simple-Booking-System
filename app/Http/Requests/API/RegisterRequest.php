<?php

namespace App\Http\Requests\API;

use App\Rules\ValidBDMobileNumber;
use App\Http\Requests\API\FormRequest;

class RegisterRequest extends FormRequest
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
            'full_name'    => ['required','string','max:120'],
            'email'        => ['required','email','unique:users,email'],
            'phone_number' => ['required','string', new ValidBDMobileNumber,'unique:users,phone_number'],
            'password'     => ['required', 'string', 'min:8', 'max:16'],
        ];
    }
}
