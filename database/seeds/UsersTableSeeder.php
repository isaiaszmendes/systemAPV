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
            'name'      => "Gabriel Admin",
            'email'     => "admin@email.com",
            'password'  => bcrypt("123456"),
        ]);

        User::create([
            'name'      => "Vitória Atendente",
            'email'     => "atendente@email.com",
            'password'  => bcrypt("123456"),
        ]);

        User::create([
            'name'      => "Tatiane Requerente",
            'email'     => "requerente@email.com",
            'password'  => bcrypt("123456"),
        ]);
    }
}
