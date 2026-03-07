<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class UsersCreateRequest extends FormRequest
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
            'name' => 'nullable|string|max:100',
            'email' => 'required|email|unique:users,email',
           
            'rol'=>'required|string|max:100',
            'permisos'=>'nullable|array'
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo no tiene un formato válido',
            'email.unique' => 'El correo ya está registrado',
            
            'rol.required' => 'El rol es obligatorio',
            'rol.max' => 'El rol no puede tener más de 100 caracteres',
            'rol.string' => 'El rol debe ser una cadena de texto',
            'permisos.array' => 'Los permisos deben ser un arreglo'
        ];
    }
}
