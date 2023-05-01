<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Vaga;
// use yajara;


class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vagas/listar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vagas/cadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vagas= Vaga::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'tipo' => $request->tipo,
        ]);
        if ($vagas) { 
            return redirect()->route('vagas.index')->with('message', 'Registro inserido com sucesso!'); 
        } else { 
            return redirect()->back()->with('error', 'Ocorreu um problema ao inserir o registro!'); 
        } 
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vaga = Vaga::findOrFail($id);
        return view('vagas.cadastro', compact('vaga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vaga = Vaga::findOrFail($id);

        $vaga->update([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'descricao' => $request->descricao,
        ]);
        return redirect()->route('vagas.index')->with('success', 'vaga atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vaga = Vaga::findOrFail($id);
        $vaga->delete();
        return response()->json(['success' => true]);
    }
}
