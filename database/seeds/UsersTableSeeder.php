<?php

use Illuminate\Database\Seeder;
use systemAPV\Models\User;

class UsersTableSeeder extends Seeder 
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => "Gabriel",
            'email'     => "admin@email.com",
            'password'  => bcrypt("123456"),
        ]);
    }
}
