<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidarUsuariosRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:40',
            'app' => 'required',
            'apm' => 'required',
            'fn' => 'required|date',
            'genero' => 'required',
            'correo' => 'email',
            'contrasena' => 'required',
            'id_tipo' => 'required'
        ];
    }
}
