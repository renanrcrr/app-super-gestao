
@php

@endphp

{{-- @dd($fornecedores) --}}

@if(count($fornecedores) && count($fornecedores) <= 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif (count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@endif