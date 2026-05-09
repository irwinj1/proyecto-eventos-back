<?php

namespace App\Http\Controllers\Api\catalogos;

use App\Http\Controllers\Controller;
use App\Models\CtlDepartamento;
use App\Models\CtlDistrito;
use App\Models\CtlMunicipio;
use App\Models\CtlPais;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CatalagosController extends Controller
{
    use ApiResponse;

    public function pais()
    {
        try {
            $pais = CtlPais::all();
            return $this->success("Listado Paises", 200, $pais);
        } catch (\Throwable $th) {
            return $this->error("Error al obtener los paises: " . $th->getMessage(), 500);
        }
    }

    public function departamentos(Request $request)
    {
        try {
            $perPage = $request->per_page ?? 20;
            $departamentos = CtlDepartamento::query();

            if ($request->has('idPais')) {
                $departamentos->where('pais_id', $request->idPais);
            }

            if ($request->has('search')) {
                $departamentos->where('nombre', 'ilike', '%' . $request->search . '%');
            }

            $departamentosPaginate = $departamentos->paginate($perPage);

            $pagination = [
                'perPage' => $departamentosPaginate->perPage(),
                'currentPage' => $departamentosPaginate->currentPage(),
                'lastpage' => $departamentosPaginate->lastPage(),
                'total' => $departamentosPaginate->total()
            ];

            $departamentosMap = $departamentosPaginate->map(function ($q) {
                return [
                    'id' => $q->id,
                    'nombre' => $q->nombre,
                    'pais_id' => $q->pais_id
                ];
            });

            return $this->success('Listado departamentos', 200, $departamentosMap, $pagination);
        } catch (\Throwable $th) {
            return $this->error("Error al obtener los departamentos: " . $th->getMessage(), 500);
        }
    }

    public function municipios(Request $request)
    {
        try {
            $perPage = $request->per_page ?? 20;
            $municipios = CtlMunicipio::query();

            if ($request->has('id_departamento')) {
                $municipios->where('id_departamento', $request->id_departamento);
            }

            if ($request->has('search')) {
                $municipios->where('nombre', 'ilike', '%' . $request->search . '%');
            }

            $municipiosPaginate = $municipios->paginate($perPage);

            $pagination = [
                'perPage' => $municipiosPaginate->perPage(),
                'currentPage' => $municipiosPaginate->currentPage(),
                'lastpage' => $municipiosPaginate->lastPage(),
                'total' => $municipiosPaginate->total()
            ];

            $municipiosMap = $municipiosPaginate->map(function ($q) {
                return [
                    'id' => $q->id,
                    'nombre' => $q->nombre,
                    'id_departamento' => $q->id_departamento
                ];
            });

            return $this->success('Listado municipios', 200, $municipiosMap, $pagination);
        } catch (\Throwable $th) {
            return $this->error("Error al obtener los municipios: " . $th->getMessage(), 500);
        }
    }

    public function distritos(Request $request)
    {
        try {
            $perPage = $request->per_page ?? 20;
            $distritos = CtlDistrito::query();

            if ($request->has('id_municipio')) {
                $distritos->where('id_municipio', $request->id_municipio);
            }

            if ($request->has('search')) {
                $distritos->where('nombre', 'ilike', '%' . $request->search . '%');
            }

            $distritosPaginate = $distritos->paginate($perPage);

            $pagination = [
                'perPage' => $distritosPaginate->perPage(),
                'currentPage' => $distritosPaginate->currentPage(),
                'lastpage' => $distritosPaginate->lastPage(),
                'total' => $distritosPaginate->total()
            ];

            $distritosMap = $distritosPaginate->map(function ($q) {
                return [
                    'id' => $q->id,
                    'nombre' => $q->nombre,
                    'id_municipio' => $q->id_municipio
                ];
            });

            return $this->success('Listado distritos', 200, $distritosMap, $pagination);
        } catch (\Throwable $th) {
            return $this->error("Error al obtener los distritos: " . $th->getMessage(), 500);
        }
    }
}

