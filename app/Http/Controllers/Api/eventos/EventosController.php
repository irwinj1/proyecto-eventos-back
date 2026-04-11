<?php

namespace App\Http\Controllers\Api\eventos;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    //
    use ApiResponse;
    public function index(Request $request){
        try {
            
        } catch (\Throwable $th) {
            //throw $th;
            return $this->error('Error al obtener los eventos');
        }
    }
}
