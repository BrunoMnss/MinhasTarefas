<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTarefa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
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
