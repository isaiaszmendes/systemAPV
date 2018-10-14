<?php

use Illuminate\Database\Seeder;
use systemAPV\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'          => 'view_all',
            'description'   => 'CRUD de Atendentes Requerentes'
        ]);

        Permission::create([
            'name'          => 'view_requerentes',
            'description'   => 'Read de Requerentes'
        ]);

        Permission::create([
            'name'          => 'accept_call',
            'description'   => 'Aceitar Requisições de Suporte'
        ]);

        Permission::create([
            'name'          => 'create_call',
            'description'   => 'Criar Requisições de Suporte'
        ]);

        Permission::create([
            'name'          => 'request_called',
            'description'   => 'Solicitar Chamado'
        ]);
    }
}
