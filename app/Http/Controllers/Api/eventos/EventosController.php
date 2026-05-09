<?php

namespace App\Http\Controllers\Api\eventos;

use App\Http\Controllers\Controller;
use App\Http\Requests\Evento\CreateEventoRequest;
use App\Models\MntDireccion;
use App\Models\MntEvento;
use App\Models\MntEventoArchivo;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventosController extends Controller
{
    use ApiResponse;

    public function index(Request $request)
    {
        try {
            $eventos = MntEvento::with(['categoria', 'direcciones.distrito.municipio.departamentos.pais', 'archivos'])->paginate($request->limit);
            return $this->success('Listado de eventos', 200, $eventos);
        } catch (\Throwable $th) {
            return $this->error('Error al obtener los eventos');
        }
    }

    public function crearEvento(CreateEventoRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();

            $fechaInicio = Carbon::parse($validated['fecha_inicio']);
            $fechaFin = Carbon::parse($validated['fecha_fin']);
            if ($fechaInicio->gt($fechaFin)) {
                return $this->error('La fecha de inicio debe ser menor a la fecha de fin', 400);
            }

            $evento = new MntEvento();
            $evento->nombre = $validated['nombre'];
            $evento->descripcion = $validated['descripcion'];
            $evento->slug = Str::slug($validated['nombre']) . '-' . time();
            $evento->fecha_inicio = $fechaInicio;
            $evento->fecha_fin = $fechaFin;
            $evento->id_categoria = $validated['id_categoria'];
            $evento->localidad = $validated['localidad'];
            $evento->es_online = $validated['es_online'];
            $evento->cantidad_asistentes = $validated['cantidad_asistentes'];
            $evento->meet_url = $validated['meet_url'];
            $evento->es_silla_numerada = $validated['es_silla_numerada'];
            $evento->estado = true;
            $evento->id_usuario = 1;
            $evento->id_usuario_creacion = 1;

            if ($request->hasFile('imagen')) {
                $path = $request->file('imagen')->store('eventos', 'public');
                $evento->imagen = $path;
            }

            $evento->save();

            if ($request->hasFile('archivos')) {
                $files = $request->file('archivos');
                foreach ($files as $file) {
                    $path = $file->store('eventos/archivos', 'public');
                    MntEventoArchivo::create([
                        'id_evento' => $evento->id,
                        'nombre' => $file->getClientOriginalName(),
                        'tipo' => $file->getClientOriginalExtension(),
                        'url' => $path,
                        'id_usuario_creacion' =>1
                    ]);
                }
            }

            if ($request->has('id_distrito') && !empty($validated['id_distrito'])) {
                $direccion = new MntDireccion();
                $direccion->id_distrito = $validated['id_distrito'];
                $direccion->direccion = $validated['direccion'] ?? null;
                $direccion->id_evento = $evento->id;
                $direccion->id_tipo_direccion = 2; // Ejemplo: 2 para eventos
                $direccion->id_usuario_creacion =1;
                $direccion->save();
            }

            DB::commit();
            return $this->success('Evento creado exitosamente', 201, $evento);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->error('Error al crear el evento: ' . $e->getMessage(), 500);
        }
    }
}
