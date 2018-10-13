<?php

use Illuminate\Database\Seeder;
use systemAPV\Models\UserRole;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'user_id'   =>  '1',
            'role_id'   =>  '1',
        ]);
    }
}
