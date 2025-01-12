<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $error = '';

        if($request->get('error') == 1){
            $error = 'Usuário e/ou senha não existe.';
        }

        if($request->get('error') == 2){
            $error = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'error' => $error]);
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

        //Recuperamos os parametros do user
        $email = $request->get('usuario');
        $password = $request->get('senha');

        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if(isset($usuario->name)){
            session_start();

            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');

        } else {
            return redirect()->route('site.login', ['error'=>1]);
        }
    }
}
