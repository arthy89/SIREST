<?php

namespace App\Http\Requests\Backend\Negocio;

use Illuminate\Foundation\Http\FormRequest;

class NegocioRequest extends FormRequest
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
            //
            'neg_nombre' => 'required',
            'neg_direccion' => 'required',
            'neg_pais' => 'required',
            'neg_cod' => 'required',
            'neg_telefono' => 'required',
            'neg_garantia' => 'required',
        ];
    }
}
