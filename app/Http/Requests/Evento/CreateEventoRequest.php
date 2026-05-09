<?php

namespace App\Http\Requests\Evento;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventoRequest extends FormRequest
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
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'capacidad' => 'nullable|integer',
            'id_categoria' => 'required|integer',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'localidad' => 'nullable|string|max:255',
            'id_distrito' => 'nullable|integer',
            'es_online' => 'required|boolean',
            'cantidad_asistentes' => 'required|integer',
            'meet_url' => 'nullable|string|max:255',
            'es_silla_numerada' => 'required|boolean',
            'archivos' => 'nullable|array',
            'archivos.*' => 'file|mimes:pdf,doc,docx|max:2048',
            'direccion' => 'nullable|string|max:255',
            
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'nombre.string' => 'El nombre debe ser una cadena de texto',
            'nombre.max' => 'El nombre no puede exceder los 255 caracteres',
            'descripcion.nullable' => 'La descripcion es opcional',
            'descripcion.string' => 'La descripcion debe ser una cadena de texto',
            'fecha_inicio.required' => 'La fecha de inicio es obligatoria',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha',
            'fecha_fin.required' => 'La fecha de fin es obligatoria',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha',
            'id_categoria.required' => 'La categoria es obligatoria',
            'id_categoria.integer' => 'La categoria debe ser un numero entero',
            'imagen.required' => 'La imagen es obligatoria',
            'imagen.image' => 'La imagen debe ser una imagen',
            'imagen.mimes' => 'La imagen debe ser jpeg, png o jpg',
            'imagen.max' => 'La imagen no puede exceder los 2MB',
            'localidad.nullable' => 'La localidad es opcional',
            'localidad.string' => 'La localidad debe ser una cadena de texto',
            'localidad.max' => 'La localidad no puede exceder los 255 caracteres',
            'id_distrito.nullable' => 'El distrito es opcional',
            'id_distrito.integer' => 'El distrito debe ser un numero entero',
            'es_online.required' => 'El es_online es obligatorio',
            'es_online.boolean' => 'El es_online debe ser un booleano',
            'cantidad_asistentes.required' => 'La cantidad de asistentes es obligatoria',
            'cantidad_asistentes.integer' => 'La cantidad de asistentes debe ser un numero entero',
            'meet_url.nullable' => 'El meet_url es opcional',
            'meet_url.string' => 'El meet_url debe ser una cadena de texto',
            'meet_url.max' => 'El meet_url no puede exceder los 255 caracteres',
            'es_silla_numerada.required' => 'El es_silla_numerada es obligatorio',
            'es_silla_numerada.boolean' => 'El es_silla_numerada debe ser un booleano',
            'archivos.nullable' => 'Los archivos son opcionales',
            'archivos.array' => 'Los archivos deben ser un array',
            'archivos.*.file' => 'Los archivos deben ser archivos',
            'archivos.*.mimes' => 'Los archivos deben ser pdf, doc o docx',
            'archivos.*.max' => 'Los archivos no pueden exceder los 2MB',
            'direccion.nullable' => 'La direccion es opcional',
            'direccion.string' => 'La direccion debe ser una cadena de texto',
            'direccion.max' => 'La direccion no puede exceder los 255 caracteres',
        ];
    }

}
