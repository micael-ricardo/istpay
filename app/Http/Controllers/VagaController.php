<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Vaga;

class VagaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vagas/listar');
    }

        // Datatable
        public function dataTable()
        {
            // Pegar dados da tabela
            $vagas = Vaga::all();
              // chamar a API Resource
            //   $vagas_resource = UsuariosResource::collection($vagas);
    
            // $data = $usuario_despesas_resource->map(function ($usuario) {
            //     return [
            //         'nome' => $usuario->nome,
            //         'email' => $usuario->email,
            //         'cep' => $usuario->cep,
            //         'estado' => $usuario->estado,
            //         'cidade' => $usuario->cidade,
            //         'bairro' => $usuario->bairro,
            //         'rua' => $usuario->rua,
            //         'numero' => $usuario->numero,
            //         'telefone' => $usuario->telefone,
            //         'nivel_acesso' => $usuario->nivel_acesso,
            //         'created_at' => $usuario->created_at->format('d-m-Y H:i'),
            //         'id' => $usuario->id,
            //     ];
            // })->toArray();
    
            // $usuario_despesas_resource = DataTables::of($data);
            // return $usuario_despesas_resource->make(true);
    
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
