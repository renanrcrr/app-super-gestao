<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    function contato(Request $request) {
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';

        $contato = new SiteContato();

        // Method #1 to create an obj
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        
        // Method #2 to create an obj
        // $contato->create($request->all());
        
        // Method #3 to create an obj
        $contato->fill($request->all());
        
        $contato->save();
        // print_r($contato->getAttributes());

        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }
}
