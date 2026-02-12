<?php

namespace Database\Seeders;

use App\Models\CtlCategoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            ['nombre' => 'Capacitación', 'estado' => true,'color'=>'#ccc','icono'=>'md:prueba'],
            ['nombre' => 'Diplomado', 'estado' => true,'color'=>'#ccc','icono'=>'md:prueba'],
        ];
        
        foreach ($data as $item) {
            CtlCategoria::updateOrCreate(
                ['nombre' => $item['nombre']],
                $item
            );
        }

    }
}
