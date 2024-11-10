<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        // regras de validacao
        $rules = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagens de feedback de validacao
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // se não passar pelo validate
        $request->validate($rules, $feedback);

        print_r($request->all());
    }
}
