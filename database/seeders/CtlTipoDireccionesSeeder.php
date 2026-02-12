<?php

namespace Database\Seeders;

use App\Models\CtlTipoDireccion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlTipoDireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        collect([
            'Persona',
            'Evento'
        ])->each(fn($d)=>CtlTipoDireccion::updateOrCreate(['nombre'=>$d]));
    }
}
