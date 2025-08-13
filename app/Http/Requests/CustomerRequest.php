<?php

namespace App\Http\Requests;

use App\Rules\ValidBDMobileNumber;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email'        => ['required','email','unique:users,email,'.request()->update_id],
            'phone_number' => ['required','string', new ValidBDMobileNumber,'unique:users,phone_number,'.request()->update_id],
            'avatar'       => ['nullable','image','mimes:png,jpg','max: 1024']
        ];
    }
}
