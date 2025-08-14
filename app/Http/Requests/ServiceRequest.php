<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
        $rules = [
            'name'        => ['required','string','max:150','unique:services,name'],
            'description' => ['required','string','max:300'],
            'price'       => ['required','numeric'],
            'status'      => ['required','in:1,2'],
        ];

        if(request()->update_id){
            $rules['name'][3] = 'unique:services,name,'.request()->update_id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The service field is required.',
            'name.string'   => 'The service field must be a string.',
            'name.max'      => 'The service field must not be greater than 150.',
            'name.unique'   => 'The service has already been taken.',
        ];
    }
}
