<?php

namespace App\Http\Controllers\Api\Persona;

use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Persona\CrearPersonaRequest;
use App\Models\MntContacto;
use App\Models\MntDireccion;
use App\Models\MntPersona;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    //
    use ApiResponse;
    public function index(Request $request){
        try {
            $persona = MntPersona::with([
                'genero',
                'usuario',
                'direcciones.distrito.municipio.departamentos.pais',
                'contactos'
            ])
            ->when($request->has('genero'),function($q) use($request){
            $q->where('id_genero',$request->get('genero'));
            });
            // if($request->has('genero')){
            //     $persona->where('id_genero',$request->genero);
            // }
      
            $personaPaginate =$persona->paginate(10);
            $personaMap = $personaPaginate->map(function($p){
                return [
                    'id'=>$p->id,
                    'nombre'=>$p->nombre,
                    'apellido'=>$p->apellido,
                    'fecha_nacimiento'=>$p->fecha_nacimiento
                ];
            });
           
            
            return $this->success('Lista Usuarios', 200, $personaMap);
        } catch (\Throwable $th) {
            //throw $th;
            return $this->error('Error al obtener la persona');
        }
    }
    public function crearPersona(CrearPersonaRequest $request){
        try {
            
            $validated = $request->validated();
           
            $rol = $request->input('rol') ?? 'User';
            \DB::beginTransaction();
            $userData =[
                'email'=>$validated['email'],
                'rol'=>$rol,
                'name'=> $validated['nombre'],
              ];
              $userController = new UserController();
              $user = $userController->createUser($userData);
             
              $persona = [
                'nombre'=>$validated['nombre'],
                'apellido'=>$validated['apellido'],
                'estado'=>$validated['estado'],
                'fecha_nacimiento'=>$validated['fecha_nacimiento'],
                'id_genero'=>$validated['id_genero'],
                'id_usuario'=>$user['id'],
              ];
              
              $personaData = MntPersona::create($persona);
             $dataDireccion = [
                'direccion'=>$validated['direccion'],
                'id_distrito'=>$validated['id_distrito'],
                'id_tipo_direccion'=>$validated['id_tipo_direccion'],
                    'id_persona'=>$personaData->id,
             ];
             
              if($dataDireccion){
               
                MntDireccion::create([
                    'direccion'=>$validated['direccion'],
                    'id_distrito'=>$validated['id_distrito'],
                    'id_tipo_direccion'=>$validated['id_tipo_direccion'],
                    'id_persona'=>$personaData->id,
                ]);
                
                }
                
                $contactos = collect($validated['contactos']);
               
                if($contactos){
                    foreach($contactos as $contacto){
                        MntContacto::create([
                            'nombre'=>$contacto['nombre'],
                            'id_tipo_contacto'=>$contacto['id_tipo_contacto'],
                            'id_persona'=>$personaData->id,
                        ]);
                    }
              }
            \DB::commit();
            return $this->success('Persona creada', 200, $validated);
        } catch (\Throwable $th) {
            return $this->error('Error al crear la persona: ' . $th->getMessage(), 500);
        }
    }
}
