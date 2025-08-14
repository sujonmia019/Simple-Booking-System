<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest AS LaravelFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class FormRequest extends LaravelFormRequest
{
    abstract public function rules();

    abstract public function authorize();

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => 'Form Field Validation',
                'errors' => $validator->errors()
            ])
        );
    }
}
