<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'ci'=> 'required|max:15',
            'exped'=> 'required|max:5',
            'nombre'=> 'required|max:20',
            'paterno'=> 'required|max:20',
            'materno'=> 'max:20',
            'celular'=> 'required|max:15',
            'direccion'=> 'max:50',
            'fecha_nac'=> 'required|max:15',
            'genero'=> 'required|max:15',
            'edad'=> 'required|max:15',

        ];
    }
}
