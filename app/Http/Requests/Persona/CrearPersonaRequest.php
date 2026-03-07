<?php

namespace App\Http\Requests\Persona;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class CrearPersonaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "nombre"=> "required|string|max:255",
            "apellido"=> "required|string|max:255",
            "estado"=> "required|boolean",
            "fecha_nacimiento"=> "required|date",
            "id_genero"=> "required|exists:ctl_genero,id",
           
            "direccion"=> "required|string|max:255",
            "id_distrito"=> "required|exists:ctl_distritos,id",
            "id_tipo_direccion"=> "required|exists:ctl_tipo_direcciones,id",
           
            "contactos"=> "nullable|array",
            "contactos.*.nombre"=> "required|string|max:255",
            "contactos.*.id_tipo_contacto"=> "required|exists:ctl_tipo_contactos,id",

            "email"=> "required|email|unique:users,email|max:255|min:10",
            "rol"=> "nullable|exists:roles,name",
        ];
    }
    public function messages()
    {
       return [
        "nombre.required"=> "El nombre es requerido",
        "nombre.string"=> "El nombre debe ser un string",
        "nombre.max"=> "El nombre debe tener como maximo 255 caracteres",
        "apellido.required"=> "El apellido es requerido",
        "apellido.string"=> "El apellido debe ser un string",
        "apellido.max"=> "El apellido debe tener como maximo 255 caracteres",
        "estado.required"=> "El estado es requerido",
        "estado.boolean"=> "El estado debe ser un booleano",
        "fecha_nacimiento.required"=> "La fecha de nacimiento es requerida",
        "fecha_nacimiento.date"=> "La fecha de nacimiento debe ser una fecha",
        "id_genero.required"=> "El genero es requerido",
        "id_genero.exists"=> "El genero no existe",
      
        "direccion.required"=> "La direccion es requerida",
        "direccion.string"=> "La direccion debe ser un string",
        "direccion.max"=> "La direccion debe tener como maximo 255 caracteres",
        "id_distrito.required"=> "El distrito es requerido",
        "id_distrito.exists"=> "El distrito no existe",
        "id_tipo_direccion.required"=> "El tipo de direccion es requerido",
        "id_tipo_direccion.exists"=> "El tipo de direccion no existe",
       
        "contactos.required"=> "Los contactos son requeridos",
        "contactos.array"=> "Los contactos deben ser un array",
        "contactos.*.nombre.required"=> "El nombre es requerido",
        "contactos.*.nombre.string"=> "El nombre debe ser un string",
        "contactos.*.nombre.max"=> "El nombre debe tener como maximo 255 caracteres",
        "contactos.*.id_tipo_contacto.required"=> "El tipo de contacto es requerido",
        "contactos.*.id_tipo_contacto.exists"=> "El tipo de contacto no existe",
        "email.required"=> "El email es requerido",
        "email.email"=> "El email no es valido",
        "email.unique"=> "El email ya esta registrado",
        "email.max"=> "El email debe tener como maximo 255 caracteres",
        "email.min"=> "El email debe tener como minimo 10 caracteres",
        "rol.exists"=> "El rol no existe",
       ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();
        $firstKey = $errors->keys()[0];
        $firstMessage = $errors->first();

        throw ValidationException::withMessages([$firstKey => [$firstMessage]]);
    }
}
