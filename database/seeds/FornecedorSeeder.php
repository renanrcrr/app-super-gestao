<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // First obj using an instance method
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'PA';
        $fornecedor->email = 'contato@fornecedor100.com.br';
        $fornecedor->save();

        // Second obj using the class method
        // Note : Attention to attribute fillable at Fornecedor
        Fornecedor::create([
            'nome'  => 'Fornecedor 200',
            'site'  => 'fornecedor200.com.br',
            'uf'    => 'RJ',
            'email' => 'contato@fornecedor200.com.br'
        ]);

        // Third obj using insert method from DB
        DB::table('fornecedores')->insert([
            'nome'  => 'Fornecedor 300',
            'site'  => 'fornecedor300.com.br',
            'uf'    => 'MG',
            'email' => 'contato@fornecedor300.com.br'
        ]);
    }
}
