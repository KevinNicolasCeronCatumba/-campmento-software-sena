<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreBootcampRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required|min:5",
            "description" => "required",
            "website" => "url",
            "phone" => "",
            "user_id" => "required|exists:users,id",
            "average_rating" => "numeric",
            "average_cost" => "numeric"
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Nombre requerido.',
            'name.min' => 'Minimo 5 caracteres.',
            'website.url' => "direcion url invalida",
            'user_id.exists' => 'usuario no existe'
        ];
    }
    //enviar respuesta con errores de validacion
    protected function failedValidation(Validator $v){
        //si la validacoin es fallida se envia una excepcoin http
        throw new HttpResponseException(
            response()->json([
                "success" => false,
                "error" => $v->errors()
            ],422)
        );
    }
    
}

