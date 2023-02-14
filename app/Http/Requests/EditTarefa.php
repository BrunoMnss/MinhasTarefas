<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTarefa extends FormRequest
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
            'horario' => ['required'],
            'tarefa' => ['required', 'min:10', 'max:500'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido',

            'tarefa.max' => 'O campo <b>TAREFA</b> nao pode conter mais que 500 caracteres.',
            'tarefa.min' => 'O campo <b>TAREFA</b> deve conter ao menos 10 caracteres.',
        ];
    }
}
