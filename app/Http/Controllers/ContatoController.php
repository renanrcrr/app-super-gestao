<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    function contato() {
        // dd($_POST);
        return view('site.contato', ['titulo' => 'Contato (teste)']);
    }
}
