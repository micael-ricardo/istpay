<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidato;

class CandidatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Candidato::create([
            'nome' => 'Candidato Seederes',
            'email' => 'candidato@seeders.com',
            'telefone' => '31992995832',
            'curriculo' => 'Desenvolvedor a 4 Anos'
        ]);
    }
}
