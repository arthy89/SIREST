<?php

namespace App\Http\Requests\Backend\Promociones;

use Illuminate\Foundation\Http\FormRequest;

class PromocionesRequest extends FormRequest
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
            'nombre_promocion' => 'required',
            //'fecha_inicio' => 'required',
            //'fecha_final' => 'required',
            'tipo_descuento' => 'required',
            'cantidad_descuento' => 'required',
            'productoid' => 'required'
        ];
    }
}
