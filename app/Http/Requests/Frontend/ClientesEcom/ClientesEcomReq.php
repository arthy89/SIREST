<?php

namespace App\Http\Requests\frontend\ClientesEcom;

use Illuminate\Foundation\Http\FormRequest;

class ClientesEcomReq extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => ['required', 'unique:persona,identificacion'],
            'telefono' => 'required',
            'password' => 'required',
            'direccionfiscal' => 'required',
            'email' => ['required', 'email', 'string', 'unique:persona,email'],
        ];
    }
}
