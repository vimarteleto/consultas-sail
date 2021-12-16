<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => ['string', 'email', Rule::unique('users')->ignore(request()->id)],
            'crm' => ['max:10', Rule::unique('users')->ignore(request()->id)],
            'name' => ['string'],
            'specialty_id' => ['exists:App\Models\Specialty,id'],
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
        ];
    }

    public function failedValidation(Validator $validator)
    {
        if($this->isJson()) {
            throw new HttpResponseException(response()->json($validator->errors(), 400));
        } else {
            $response = redirect('dashboard')->with(['warning' => $validator->errors()->all()[0]]);
            throw new HttpResponseException($response);
        }
    }
}
