<?php

use systemAPV\Models\Call;
use Illuminate\Database\Seeder;

class CallsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Call::class, 10)->create();
    }
}
