@extends('layoult.principal')
@section('conteudo')

<h1>Novo produto</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<form action="/produtos/novo" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control" value="{{ old('nome') }}" required />
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <input name="descricao" class="form-control" value="{{ old('descricao') }}" required />
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control" value="{{ old('valor') }}" required />
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input name="quantidade" type="number" class="form-control" value="{{ old('quantidade') }}" required/>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
</form>

@stop
