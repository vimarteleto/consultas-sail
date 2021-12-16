<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class RegisterPatientRequest extends FormRequest
{

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
        if($this->isJson()) {
            throw new HttpResponseException(response()->json($validator->errors(), 400));
        } else {
            $response = redirect('patients')->with(['warning' => $validator->errors()->all()[0]]);
            throw new HttpResponseException($response);
        }
    }
}
