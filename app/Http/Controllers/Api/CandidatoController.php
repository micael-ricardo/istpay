<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidato;
use Yajra\DataTables\DataTables;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Candidato::query();

        // Filtros

        if ($request->has('nome') && $request->input('nome') !== null) {
            $query->where('nome', 'ILIKE', '%' . $request->input('nome') . '%');
        }
        if ($request->has('telefone') && $request->input('telefone') !== null) {
            $query->where('telefone', 'ILIKE', '%' . $request->input('telefone') . '%');
        }
        if ($request->has('email') && $request->input('email') !== null) {
            $query->where('email', 'ILIKE', '%' . $request->input('email') . '%');
        }
        if ($request->has('curriculo') && $request->input('curriculo') !== null) {
            $query->where('curriculo', 'ILIKE', '%' . $request->input('curriculo') . '%');
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
