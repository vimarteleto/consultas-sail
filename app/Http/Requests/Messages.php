<?php

namespace App\Http\Requests;

class Messages
{
    public $webMessages = [
        'required' => 'O campo :attribute é obrigatório',
        'email' => 'O campo :attribute é um endereço inválido',
        'unique' => 'O atributo :attribute já está cadastrado no sistema',
        'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
        'max' => 'O campo :attribute deve ter no máximo :max caracteres',
        'exists' => 'O campo :attribute não existe no sistema',
        'date' => 'Formato de data inválida',
    ];

    public $jsonMessages = [
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