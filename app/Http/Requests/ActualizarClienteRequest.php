<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActualizarClienteRequest extends FormRequest
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
            "nombre" => "required",
            "fechaNac" => "required", 
            "dui" => "required|unique:clientes,dui,".$this->route('cliente')->id,
            "telefono" => "required",
            "direccion" => "required"
        ];
    }
}
