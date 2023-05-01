<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Vaga;
// use yajara;


class VagaController extends Controller
{

    // Tela de listar
    public function index()
    {
        return view('vagas/listar');
    }

    // Tela de cadastro
    public function create()
    {
        return view('vagas/cadastro');
    }

    // Inserir dados 
    public function store(Request $request)
    {
        $vagas = Vaga::create([
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

    // Tela de Editar
    public function edit(string $id)
    {
        $vaga = Vaga::findOrFail($id);
        return view('vagas.cadastro', compact('vaga'));
    }

    // Atualizar
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

    // Delete
    public function destroy(string $id)
    {
        $vaga = Vaga::findOrFail($id);
        $vaga->delete();
        return response()->json(['success' => true]);
    }

    // Atualizar status da vaga
    public function atualizarStatus(Request $request, $id)
    {
        $vaga = Vaga::findOrFail($id);
        // dd( $vaga);
        $vaga->pausada = $request->input('pausada') ? true : false;
        $vaga->save();

        return response()->json(['success' => true]);
    }
}
