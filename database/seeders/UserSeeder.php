<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Jorem Belen',
            'email' => 'iam@joreb.net',
            'role' => 'ADM',
            'password' => 'password',
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@joreb.net',
            'role' => 'USR',
            'password' => 'password',
        ]);


    }

}
