<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\User;
use  App\Models\Candidato;

use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    // Criação do usuário + Candidato
    public function storeWithCandidato(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidatos|unique:users',
            'telefone' => 'required|string|max:20',
            'curriculo' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

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
