<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'nombre'        => 'required|unique:productos',
            'descripcion'   => 'required|max:20',
            'precio'        => 'required|numeric',
            'categorias_id' => 'required|exists:categorias,id'
        ];
    }

   public function messages(){
        return [
            'nombre.required'           => 'El campo nombre es obligatorio',
            'nombre.unique'             => 'El campo nombre ya existe',
            'precio.numeric'            => 'El campo precio debe ser numerico',
            'descripcion.required'      => 'El campo descripción es obligatorio',
            'descripcion.max'           => 'El campo descrpción supera el límite de caracteres',
            'precio.required'           => 'El campo precio es obligatorio',
            'categorias_id.required'    => 'El campo categorias es obligatorio',
            'categorias_id.exists'         => 'La categoria no existe'
        ];
    }
}
