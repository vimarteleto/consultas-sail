<?php

namespace App\Http\Requests\Specialty;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateSpecialtyRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', Rule::unique('specialties')->ignore(request()->id)],
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
            $response = redirect('specialties')->with(['warning' => $validator->errors()->all()[0]]);
            throw new HttpResponseException($response);
        }
    }
}
