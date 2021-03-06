<?php

namespace App\Http\Requests\Appointment;

use App\Http\Requests\Messages;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateAppointmentRequest extends FormRequest
{
    protected $messages;

    public function __construct(Messages $messages)
    {
        $this->messages = $messages;
    }

    protected function prepareForValidation()
    {
        if(!isset($this->date_time)) {
            $date_time = "$this->date $this->time:00";
            $this->merge(['date_time' => $date_time]);
        }
    }

    public function rules()
    {
        return [
            'user_id' => ['exists:App\Models\User,id'],
            'patient_id' => ['exists:App\Models\Patient,id'],
            'date_time' => ['date_format:Y-m-d H:i:s'],
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
            $response = redirect('appointments')->with(['warning' => $validator->errors()->all()[0]]);
            throw new HttpResponseException($response);
        }
    }
}
