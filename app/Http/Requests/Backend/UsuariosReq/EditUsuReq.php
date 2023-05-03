<?php

namespace App\Http\Requests\Backend\UsuariosReq;

use Illuminate\Foundation\Http\FormRequest;

class EditUsuReq extends FormRequest
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
            'nombre' => 'required',
            'apellidos' => 'required',
            'email' => ['required', 'email'],
        ];
    }
}
