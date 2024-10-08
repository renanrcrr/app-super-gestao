<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    function salvar(Request $request) {
        $rules = [
            # With unique, Laravel uses the "nome" from the input as a parameter to determine the column in the table
            'nome' => 'required|min:3|max:40|unique:site_contatos', 
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.min' => 'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2 mil caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($rules, $feedback);
            
        SiteContato::create($request->all());
        
        return redirect()->route('site.index');
    }
}
