<?php

namespace App\Http\Requests\User;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

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
            $response = redirect('user')->with(['warning' => $validator->errors()->all()[0]]);
            throw new HttpResponseException($response);
        }
    }
}
