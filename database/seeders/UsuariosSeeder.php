<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuariosSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Inserindo Por Seederes',
            'email' => 'inserir@seeders.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

