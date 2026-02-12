<?php

namespace Database\Seeders;

use App\Models\CtlTipoContacto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CtlTipoContactosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        collect([
            'Email',
            'Télefono'
        ])->each(fn($d)=>CtlTipoContacto::updateOrCreate(['nombre'=>$d]));
    }
}
