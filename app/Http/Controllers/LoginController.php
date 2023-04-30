<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function auth(Request $request){

        $credenciais = $request->validate([

            'email' => ['required','email'],
            'password' => ['required'],
        ],[
          'email.required' => 'O campo email é obrigatório!',
          'password.required' => 'O campo senha é obrigatório!',        
        ]);

        if(Auth::attempt($credenciais,$request->remember)) {
          $request->session()->regenerate();
          return redirect()->intended('/adm/dashboard');

        }else{
            return redirect()->back()->with('erro','errooooeoe');
        }
    }

    public function create(){
      return view('login.cadastro');
    }


  }


