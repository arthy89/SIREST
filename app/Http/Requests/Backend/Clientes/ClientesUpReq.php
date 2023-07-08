<?php

namespace App\Http\Requests\Backend\Clientes;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class ClientesUpReq extends FormRequest
{
    //protected $primaryKey = 'idpersona';
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
        $cliente = $this->route('cliente');
        return [
            'nombre_cliente' => 'required',
            'apellido_cliente' => 'required',
            'identificacion_cliente' => ['required',
                        Rule::unique('persona','identificacion')->ignore($this->cliente)
                        ],
            //'identificacion_cliente' => ['required', 'unique:persona,identificacion,'. $cliente->idpersona],
            'password_cliente' => 'sometimes',
            'telefono_cliente' => 'required',
            'email_cliente'  => ['required', 'email',
                            Rule::unique('persona','email')->ignore($this->cliente)
                            ],
            'direccionfiscal_cliente' => 'sometimes',
        ];
    }
}
