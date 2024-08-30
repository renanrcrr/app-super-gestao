<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    function contato(Request $request) {

        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }

    function salvar(Request $request) {
        $request->validate([
            'nome' => 'required',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'
        ]);
        // SiteContato::create($request->all());
    }
}
