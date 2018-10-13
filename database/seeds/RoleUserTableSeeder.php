<?php

use Illuminate\Database\Seeder;
use systemAPV\Models\RoleUser;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoleUser::create([
            'user_id'   =>  '1',
            'role_id'   =>  '1',
        ]);
    }
}
