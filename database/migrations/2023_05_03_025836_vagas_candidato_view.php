<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
          DB::statement("
            CREATE VIEW vagas_candidato_view AS
          SELECT
              vagas.id as vaga_id,
              vagas.titulo,
              vagas.descricao,
              vagas.tipo,
              vagas.pausada,
              candidatos.id as candidato_id,
              candidatos.nome,
              candidatos.email,
              candidatos.telefone,
              candidatos.curriculo,
              candidato_vaga.created_at as data_criacao,
              candidato_vaga.updated_at as data_atualizacao
          FROM vagas
          JOIN candidato_vaga ON vagas.id = candidato_vaga.vaga_id
          JOIN candidatos ON candidato_vaga.candidato_id = candidatos.id
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW vaga_candidato_view");
    }
};
