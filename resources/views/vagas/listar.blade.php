@extends('template/layout')
@section('title', 'Despesas')
@section('conteudo')

<h5>Vagas</h5>
{{-- @include('mensagens.mensagens') --}}

<!-- adc -->
<div class="input-group mb-3">
    <div class="input-group-append">
        <a href="{{ route('vagas.create') }}" class="btn btn-success">Adicionar</a>
    </div>
</div>

<div class="row mt-4">
    <table id="TableVagas" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Tipo</th>
                <th>Pausada</th>
                <th>Data Cadastro</th>
                <th>Ações</th> 
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script src="{{ asset('js/DataTableVagas.js') }}"></script>
@endsection





