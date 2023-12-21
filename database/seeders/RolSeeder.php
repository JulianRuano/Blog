<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Roles = [
            [
                'name' => 'Administrador',
                'description' => 'Administrador del sistema',
            ],
            [
                'name' => 'Vendedor',
                'description' => 'Vendedor del sistema',
            ],
            [
                'name' => 'Cliente',
                'description' => 'Cliente del sistema',
            ],
        ];

        foreach ($Roles as $Rol) {
            DB::table('roles')->insert($Rol);
        }
    }
}
