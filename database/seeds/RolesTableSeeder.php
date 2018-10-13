<?php

use Illuminate\Database\Seeder;
use systemAPV\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'          => 'Administrador',
            'description'   => 'Cuida do Crud dos demais users'
        ]);

        Role::create([
            'name'          => 'Atendente',
            'description'   => 'Visualiza os Requerentes, abre e cuida dos chamados de suporte'
        ]);

        Role::create([
            'name'          => 'Requerente',
            'description'   => 'Solicita ajuda de Suporte'
        ]);
    }
}
