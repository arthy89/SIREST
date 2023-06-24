<?php

namespace App\Http\Requests\backend\Productos;

use Illuminate\Foundation\Http\FormRequest;

class ProdActReq extends FormRequest
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
            'nombre_producto' => 'required',
            'categoriaid' => 'required',
            'stock_cantidad' => 'required',
            'precio_compra' => 'required',
            'precio_mayoreo' => 'required',
            'precio_publico' => 'required',
            'descripcion' => 'required',
            'colores' => 'required',
            'tags' => 'required'

        ];
    }
}
