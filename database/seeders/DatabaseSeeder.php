<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Cristóvão Bahiense dos Santos',
            'email' => 'cristovao.santos@cachoeiro.es.gov.br',
            'password' => bcrypt('password'),
            'perfil' => 'admin',
            'cpf' => '000.000.000-00',
        ]);
    }
}
