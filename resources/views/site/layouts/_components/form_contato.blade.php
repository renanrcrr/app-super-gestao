{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}" value="{{ old('nome') }}">
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}" value="{{ old('telefone') }}">
    <input name="email" type="email" placeholder="E-mail" class="{{ $classe }}" value="{{ old('email') }}">
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="" disabled {{ old('motivo_contato') === null ? 'selected' : '' }}>Qual o motivo do contato?</option>
        <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : '' }}>Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : '' }}>Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : '' }}>Reclamação</option>
    </select>
    <textarea name="mensagem" placeholder="Preencha aqui a sua mensagem" class="{{ $classe }}">
        @if (old('mensagem') != '')
            {{ old('mensagem') }}
        @else
            Preencha aqui sua mensagem
        @endif
    </textarea>

    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

<div style="position:absolute; top:0px; left:0px; width:100%; background:red">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>