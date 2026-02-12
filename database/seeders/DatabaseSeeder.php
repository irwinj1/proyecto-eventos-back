<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CtlPaisSeeder::class,
            CtlDepartamentosSeeder::class,
            CtlMunicipiosSeeder::class,
            CtlDistritosSeeder::class,
            CtlCategoriaSeeder::class,
            CtlGeneroSeeder::class,
            CtlTipoContactosSeeder::class,
            CtlTipoDireccionesSeeder::class,
            
        ]);
    }
}
