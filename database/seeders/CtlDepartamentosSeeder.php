<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlDepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('ctl_departamentos')->insert([
            ['id' => 1, 'nombre' => 'Ahuachapán','pais_id'=>1],
            ['id' => 2, 'nombre' => 'Cabañas','pais_id'=>1],
            ['id' => 3, 'nombre' => 'Chalatenango','pais_id'=>1],
            ['id' => 4, 'nombre' => 'Cuscatlán','pais_id'=>1],
            ['id' => 5, 'nombre' => 'La Libertad','pais_id'=>1],
            ['id' => 6, 'nombre' => 'La Paz','pais_id'=>1],
            ['id' => 7, 'nombre' => 'La Unión','pais_id'=>1],
            ['id' => 8, 'nombre' => 'Morazán','pais_id'=>1],
            ['id' => 9, 'nombre' => 'San Miguel','pais_id'=>1],
            ['id' => 10, 'nombre' => 'San Salvador','pais_id'=>1],
            ['id' => 11, 'nombre' => 'San Vicente','pais_id'=>1],
            ['id' => 12, 'nombre' => 'Santa Ana','pais_id'=>1],
            ['id' => 13, 'nombre' => 'Sonsonate','pais_id'=>1],
            ['id' => 14, 'nombre' => 'Usulután','pais_id'=>1],           
          ]);

    }
}
