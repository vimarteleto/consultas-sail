<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;
use App\Http\Requests\Messages;

class UpdatePatientRequest extends FormRequest
{
    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    protected function prepareForValidation()
    {
        //
    }

    public function rules()
    {
        return [
            'cpf' => ['string', 'max:11', Rule::unique('patients')->ignore(request()->id)],
            'name' => ['string', 'min:2'],
            'birthday' => ['date'],
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
            $response = redirect('patients')->with(['warning' => $validator->errors()->all()[0]]);
            throw new HttpResponseException($response);
        }
    }
}
