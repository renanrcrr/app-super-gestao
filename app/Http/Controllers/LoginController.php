<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        //Recuperamos os parametros do user
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: email | Senha: $password";
        echo '<br>';

        //Iniciar o Model User
        $user = new User();

        //Quando a comparacao é por igualdade o operador pode ser omitido
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if(isset($usuario->name)){
            echo 'User exist.';
        } else {
            echo 'User does not exist.';
        }
    }
}
