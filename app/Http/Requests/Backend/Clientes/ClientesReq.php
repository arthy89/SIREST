<?php

namespace App\Http\Requests\Backend\Clientes;

use Illuminate\Foundation\Http\FormRequest;

class ClientesReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }



    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre_cliente' => 'required',
            'apellido_cliente' => 'required',
            'identificacion_cliente' => ['required', 'unique:persona,identificacion'],
            'password_cliente' => 'required',
            'telefono_cliente' => 'required',
            'email_cliente' => ['required', 'email', 'string', 'unique:persona,email'],
        ];
    }
    public function messages(){
        return[
            'nombre_cliente.required' => 'nombre requerido'
        ];
    }
}
