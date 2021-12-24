<?php

namespace App\Http\Requests\Specialty;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateSpecialtyRequest extends FormRequest
{
    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', Rule::unique('specialties')->ignore(request()->id)],
        ];
    }

    public function messages()
    {
        if($this->isJson()) {
            return $this->messages->jsonMessages;
        } else {
            return $this->messages->webMessages;
        }
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
