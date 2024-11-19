<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorFormRequest extends FormRequest
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
            'direccion'=> 'required|max:50',
            'usuario'=> 'max:45',
            'contraseña'=> 'max:45',
        ];
    }
}
