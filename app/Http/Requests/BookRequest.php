<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ])
        );
    }

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
            'service_id'   => ['required','integer'],
            'booking_date' => ['required','date','after_or_equal:today','date_format:Y-m-d']
        ];
    }

    public function messages()
    {
        return [
            'service_id.required' => 'The service name field is required.',
            'service_id.integer'  => 'The service field must be a integer.',
            'booking_date.after_or_equal' => 'The Booking date cannot be in the past.'
        ];
    }
}
