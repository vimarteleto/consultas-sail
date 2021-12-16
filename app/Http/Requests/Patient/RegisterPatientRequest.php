<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RegisterPatientRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        //
    }

    public function rules()
    {
        return [
            'cpf' => ['required', 'string', 'unique:patients', 'max:11'],
            'name' => ['required', 'string', 'min:2'],
            'birthday' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field :attribute is required',
            'string' => 'Field :attribute must be a string',
            'email' => 'Field :attribute must be valid email',
            'unique' => 'Field :attribute is already taken',
            'min' => 'Field :attribute must have at least :min characters',
            'max' => 'Field :attribute must have less than :max characters',
            'exists' => 'Field :attribute does not exists in database',
            'date' => 'Field :attribute must be date format',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 400));
    }
}
