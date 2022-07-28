<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Commission;
use App\Models\Employee;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        Employee::factory(50)->create();
        Client::factory(50)->create();
        Service::factory(50)->create();
        Commission::factory(5)->create();
    }
}
