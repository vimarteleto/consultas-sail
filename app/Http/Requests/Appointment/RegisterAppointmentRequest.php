<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterAppointmentRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        if(!isset($this->date_time)) {
            $date_time = "$this->date $this->time:00";
            $this->merge(['date_time' => $date_time]);
        }
        $this->merge(['user_id' => Auth::user()->id]);
    }

    public function rules()
    {
        return [
            'user_id' => ['required', 'exists:App\Models\User,id'],
            'patient_id' => ['required', 'exists:App\Models\Patient,id'],
            'date_time' => ['required', 'date_format:Y-m-d H:i:s'],
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
            'datetime' => 'Field :attribute must be datetime format',
        ];
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
