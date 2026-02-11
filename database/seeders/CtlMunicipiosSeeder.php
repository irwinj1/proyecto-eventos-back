<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlMunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('ctl_municipios')->insert([
            ['id'=>1, 'nombre'=>'Ahuachapán Norte','id_departamento'=>1],
            ['id'=>2, 'nombre'=>'Ahuachapán Centro','id_departamento'=>1],
            ['id'=>3, 'nombre'=>'Ahuachapán Sur','id_departamento'=>1],
            ['id'=>4, 'nombre'=>'Cabañas Este','id_departamento'=>2],
            ['id'=>5, 'nombre'=>'Cabañas Oeste','id_departamento'=>2],
            ['id'=>6, 'nombre'=>'Chalatenango Norte','id_departamento'=>3],
            ['id'=>7, 'nombre'=>'Chalatenango Centro','id_departamento'=>3],
            ['id'=>8, 'nombre'=>'Chalatenango Sur','id_departamento'=>3],
            ['id'=>9, 'nombre'=>'Cuscatlán Norte','id_departamento'=>4],
            ['id'=>10, 'nombre'=>'Cuscatlán Sur','id_departamento'=>4],
            ['id'=>11, 'nombre'=>'La Libertad Norte','id_departamento'=>5],
            ['id'=>12, 'nombre'=>'La Libertad Centro','id_departamento'=>5],
            ['id'=>13, 'nombre'=>'La Libertad Oeste','id_departamento'=>5],
            ['id'=>14, 'nombre'=>'La Libertad Este','id_departamento'=>5],
            ['id'=>15, 'nombre'=>'La Libertad Costa','id_departamento'=>5],
            ['id'=>16, 'nombre'=>'La Libertad Sur','id_departamento'=>5],
            ['id'=>17, 'nombre'=>'La Paz Oeste','id_departamento'=>6],
            ['id'=>18, 'nombre'=>'La Paz Centro','id_departamento'=>6],
            ['id'=>19, 'nombre'=>'La Paz Este','id_departamento'=>6],
            ['id'=>20, 'nombre'=>'La Union Norte','id_departamento'=>7],
            ['id'=>21, 'nombre'=>'La Union Sur','id_departamento'=>7],
            ['id'=>22, 'nombre'=>'Morazán Norte','id_departamento'=>8],
            ['id'=>23, 'nombre'=>'Morazán Sur','id_departamento'=>8],
            ['id'=>24, 'nombre'=>'San Miguel Norte','id_departamento'=>9],
            ['id'=>25, 'nombre'=>'San Miguel Centro','id_departamento'=>9],
            ['id'=>26, 'nombre'=>'San Miguel Oeste','id_departamento'=>9],
            ['id'=>27, 'nombre'=>'San Salvador Norte','id_departamento'=>10],
            ['id'=>28, 'nombre'=>'San Salvador Oeste','id_departamento'=>10],
            ['id'=>29, 'nombre'=>'San Salvador Este','id_departamento'=>10],
            ['id'=>30, 'nombre'=>'San Salvador Centro','id_departamento'=>10],
            ['id'=>31, 'nombre'=>'San Salvador Sur','id_departamento'=>10],
            ['id'=>32, 'nombre'=>'San Vicente Norte','id_departamento'=>11],
            ['id'=>33, 'nombre'=>'San Vicente Sur','id_departamento'=>11],
            ['id'=>34, 'nombre'=>'Santa Ana Norte','id_departamento'=>12],
            ['id'=>35, 'nombre'=>'Santa Ana Centro','id_departamento'=>12],
            ['id'=>36, 'nombre'=>'Santa Ana Este','id_departamento'=>12],
            ['id'=>37, 'nombre'=>'Santa Ana oeste','id_departamento'=>12],
            ['id'=>38, 'nombre'=>'Sonsonate Norte','id_departamento'=>13],
            ['id'=>39, 'nombre'=>'Sonsonate Centro','id_departamento'=>13],
            ['id'=>40, 'nombre'=>'Sonsonate Este','id_departamento'=>13],
            ['id'=>41, 'nombre'=>'Sonsonate Oste','id_departamento'=>13],
            ['id'=>42, 'nombre'=>'Usulután Norte','id_departamento'=>14],
            ['id'=>43, 'nombre'=>'Usulután Este','id_departamento'=>14],
            ['id'=>44, 'nombre'=>'Usulután Oeste','id_departamento'=>14],
            
        
          
          
        ]);

    }
}
