<?php

namespace Database\Seeders;

use App\Models\CtlGenero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlGeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        collect([
            'Femenino',
            'Masculino'
        ])->each(fn($d)=> 
        CtlGenero::updateOrCreate(['nombre'=>$d])
    );
      
    }
}
