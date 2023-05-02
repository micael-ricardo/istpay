<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vaga;
use Yajra\DataTables\DataTables;


class VagaController extends Controller
{

    public function index(Request $request)
    {
        $query = Vaga::query();

        // Filtros

        if ($request->has('titulo') && $request->input('titulo') !== null) {
            $query->where('titulo', 'ILIKE', '%' . $request->input('titulo') . '%');
        }
        if ($request->has('descricao') && $request->input('descricao') !== null) {
            $query->where('descricao', 'ILIKE', '%' . $request->input('descricao') . '%');
        }
        if ($request->has('tipo') && $request->input('tipo') !== null) {
            $query->where('tipo', $request->input('tipo'));
        }
        if ($request->has('pausada') && $request->input('pausada') !== null) {
            $query->where('pausada', $request->input('pausada'));
        }

        if ($request->has('data_inicio') && $request->input('data_inicio') !== null) {
            $query->whereDate('created_at', '>=', $request->input('data_inicio'));
        }

        if ($request->has('data_fim') && $request->input('data_fim') !== null) {
            $query->whereDate('created_at', '<=', $request->input('data_fim'));
        }

        // Retorna os dados filtrados se ouver filtro
        return DataTables::of($query)->toJson();
    }
}
