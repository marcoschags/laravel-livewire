<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Corrija para o namespace correto do seu modelo User
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
    }
}
