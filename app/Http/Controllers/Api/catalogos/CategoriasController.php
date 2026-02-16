<?php

namespace App\Http\Controllers\Api\catalogos;

use App\Http\Controllers\Controller;
use App\Models\CtlCategoria;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriasController extends Controller
{
    //
    use ApiResponse;
    public function index(Request $request){
        try {

            $categoria = CtlCategoria::orderBy('id','desc');
            if($request->has('nombre')){
                $categoria->where('nombre','ilike',"%$request->nombre%");
            }

            $categoria= $categoria->paginate(10);
            $paginate=[
                'perPage'=>$categoria->perPage(),
                'currentPage'=>$categoria->currentPage(),
                'lastpage' => $categoria->lastPage()
            ];
            $categoriaMap = $categoria->map(function($q){
                return [
                    'id'=>$q->id,
                    'nombre'=>$q->nombre,

                ];
            });
            return $this->success('Lista Categorias',200,$categoriaMap,$paginate);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->error('Error al obtener las categorias');
        }
    }

    public function store(Request $request){
        try {
            $validators = Validator::make($request->all(),[
                'nombre'=>'required|min:2|max:255|string',
                'color'=>'required|string|min:4|max:9',
                'icono'=>'required|string|min:2|max:255'
            ],[
                'nombre.required'=>'El nombre es requerido',
                'nombre.string'=>'El nombre debe de ser un texto',
                'nombre.min'=>'El nombre debe tener por lo menos dos caracteres',
                'nombre.max'=>'El nombre debe tener maximo 255 caracteres',

                'color.required'=>'El color es requerido',
                'color.string'=>'El color debe de ser un texto',
                'color.min'=>'El color debe tener por lo menos 4 caracteres',
                'color.max'=>'El color debe tener maximo 9 caracteres',

                'icono.required'=>'El icono es requerido',
                'icono.string'=>'El icono debe de ser un texto',
                'icono.min'=>'El icono debe tener por lo menos dos caracteres',
                'icono.max'=>'El icono debe tener maximo 255 caracteres',
            ]);
            if($validators->fails()){
                return response()->json(
                    [
                        'error'=>$validators->errors()->first(),
                    ],500
                );
            }
            $validated = $validators->validate();
            
           
            \DB::beginTransaction();
            $categoria = CtlCategoria::create($validated);
            \DB::commit();
            return $this->success('creado con exito', 200,$categoria);
        } catch (\Exception $e) {
            //throw $th;
            $this->error('Error al crear la categoria');
        }
    }
}
