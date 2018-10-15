<?php

use systemAPV\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name'          =>  'Aguardando cliente', 
            'description'   =>  'Sem nenhum cliente em mesa',
        ]);

        Status::create([
            'name'          =>  'Em atendimento',
            'description'   =>  'Atendendo um cliente',
        ]);

        Status::create([
            'name'          =>  'Necessitando ajuda',
            'description'   =>  'Solicitando ajuda de um atendente',
        ]);

        Status::create([
            'name'          =>  'Recebendo ajuda ',
            'description'   =>  'Recebendo ajuda de um atendente',
        ]);
    }
}
