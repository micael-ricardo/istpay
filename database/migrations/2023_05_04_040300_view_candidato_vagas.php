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
        CREATE VIEW view_candidato_vagas AS
        SELECT
            cv.id as cv_id,
            v1.id as vaga_id,
            v1.titulo,
            v1.descricao,
            v1.tipo,
            v1.pausada,
            candidatos.id as candidato_id,
            candidatos.nome,
            candidatos.email,
            candidatos.telefone,
            cv.created_at as data_criacao,
            cv.updated_at as data_atualizacao
        FROM vagas v1
        JOIN candidato_vaga cv ON v1.id = cv.vaga_id
        JOIN candidatos ON cv.candidato_id = candidatos.id;

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW view_candidato_vagas");
    }
};
