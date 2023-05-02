<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Candidato;

class CandidatoController extends Controller
{

    // Tela de listar
    public function index()
    {
        return view('candidatos/listar');
    }

    // Tela de cadastro
    public function create()
    {
        return view('candidatos/cadastro');
    }


    // Inserir dados
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
