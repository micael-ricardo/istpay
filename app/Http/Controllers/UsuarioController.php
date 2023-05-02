<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Candidato;
use App\Http\Requests\UsuarioCandidatoRequest;

use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    // Criação do usuário + Candidato
    public function storeWithCandidato(UsuarioCandidatoRequest $request)
    {
    
        // Criação do usuário
        $user = new User([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' =>  bcrypt($request->input('password')),
        ]);
        $user->save();

        // Criação do candidato
        $candidato = new Candidato([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'curriculo' => $request->input('curriculo'),
            'user_id' => $user->id,
        ]);
        $candidato->save();
        Auth::login($user);
        // Redirecionamento para a página de sucesso
        return redirect()->route('candidatos.index')->with('success', 'Candidato cadastrado com sucesso!');
    }

    public function create()
    {
        return view('login.cadastro');
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
