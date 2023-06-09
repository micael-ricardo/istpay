<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\Models\Vaga;
use App\Models\Candidato;

use Illuminate\Support\Facades\Auth;


class CandidatoController extends Controller
{
    // Tela de listar
    public function index()
    {

        $vagas = Vaga::where('pausada', false)->get();
        return view('candidatos/listar', ['vagas' => $vagas]);
    }

    // Tela de cadastro
    public function create()
    {
        return view('login.cadastro');
    }

    public function store(Request $request)
    {

        $vagaId = $request->input('vaga_id');
        $candidatoId = Auth::user()->candidato->id;
        $candidato = Candidato::find($candidatoId);
        $vaga = Vaga::find($vagaId);

        $candidato->vagas()->attach($vaga->id, [
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Redireciona de volta para a página de detalhes da vaga
        return redirect()->route('adm.dashboard')->with('success', 'Registro inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $candidato = Candidato::findOrFail($id);
        return view('login.cadastro', compact('candidato'));
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
        $candidato = Candidato::findOrFail($id);
        $candidato->delete();
        return response()->json(['success' => true]);
    }
}
