<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login', function(){ return 'Login'; })->name('site.login');

Route::prefix('app')->group(function(){
    Route::get('/clientes', function() { return 'clientes'; })->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function() { return 'produtos'; })->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function(){
    echo 'A rota não existe! <a href="'.route('site.index').'">Clique aqui</a> para acessa a página principal.';
});



// Route::redirect('/rota2','/rota1');

// Route::get('/rota2', function(){
//     return redirect()->route('site.rota1');
// });

// Route::get('/contato/{nome}/{assunto}/{mensagem?}', function ($nome, $assunto, $mensagem = 'mensagem nao informada') {
//     echo "Estamos aqui: $nome - $assunto - $mensagem";
// });

// Route::get('/contato/{nome}/{categoria_1}', function (string $nome, int $categoria_id) {
//     echo "Estamos aqui: $nome - $categoria_id";
// })->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
