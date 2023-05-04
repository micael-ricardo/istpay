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
        $user = User::create([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' =>  bcrypt($request->input('password')),
        ]);

        $IdUser = $user->id;
        // Criação do candidato
        $candidato = new Candidato([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'curriculo' => $request->input('curriculo'),
            'user_id' =>  $IdUser,
        ]);

        $candidato->save();
        Auth::login($user);
      
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Candidato cadastrado com sucesso! Por favor, faça login.');
    }

    public function create()
    {
        return view('login.cadastro');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, $candidatoId)
    {
        $candidato = Candidato::findOrFail($candidatoId);
        $user = User::findOrFail($request->input('userId'));

        // atualiza o usuário
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
    
        // atualiza o candidato
        $candidato->nome = $request->input('nome');
        $candidato->email = $request->input('email');
        $candidato->telefone = $request->input('telefone');
        $candidato->curriculo = $request->input('curriculo');
        $candidato->save();
    
        return redirect()->route('candidatos.index')->with('success', 'Candidato atualizado com sucesso!');
    }
    

 


    public function destroy(string $id)
    {
        //
    }
}
