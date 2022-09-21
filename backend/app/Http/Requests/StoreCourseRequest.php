<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCourseRequest extends FormRequest
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
            "title" => "required|min:10|max:30",
            "description" => "required|min:10",
            "weeks" => "required|max:1|digits:1,2,3,4,5,6,7,8,9",
            "minium_skill" => "required|in:Beginner,Intermediate,Advanced,Expert",
            "enroll_cost" => "required"
        ];
    }
    public function messages(){
        return [
            'title.required' => 'Titulo requerido.',
            'title.min' => 'Minimo 10 caracteres.',
            'title.max' => 'Maximo 30 caracteres.',
            'weeks.max' => 'Maximo 1 caracteres.',
            'weeks.digits' => 'Solo digitos de "1 a 9".',
            'description.min' => 'Minimo 10 caracteres.',
            'minium_skill.in' => 'Solo valores Beginner,Intermediate,Advanced,Expert'
            
            
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
