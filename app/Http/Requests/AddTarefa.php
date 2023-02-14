<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTarefa extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'dia' => ['required'],
            'horario' => ['required'],
            'tarefa' => ['required', 'min:5', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',

            'tarefa.max' => 'A tarefa nao pode conter mais que 500 caracteres.',
            'tarefa.min' => 'A tarefa deve conter ao menos 5 caracteres.',
        ];
    }
}
