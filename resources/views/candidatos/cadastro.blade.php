@extends('template/layout')
@if (isset($vaga))
@section('title', 'Editar Vagas')
@else
@section('title', 'Cadastrar Vagas')
@endif
@section('conteudo')

    <div class="titulo">
        <h5>{{ isset($vaga) ? 'Editar Vagas' : 'Cadastro Vagas' }}</h5>
    </div>

    @include('mensagens.mensagem')
    <form method="POST" action="{{ isset($vaga) ? route('vagas.atualizar', $vaga->id) : route('vagas.store') }}">
        {{-- previne ataques CSRF --}}
        @csrf
        @if (isset($vaga))
            @method('PATCH')
        @endif

        <div class="row mt-4">

            <div class="form-group col-md-8">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" name="titulo" id="titulo"
                    value="{{ old('titulo', isset($vaga) ? $vaga->titulo : '') }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="tipo">Tipo:</label>
                <select class="form-control select2" name="tipo" id="tipo" required>
                    <option value="">Selecione</option>
                    <option {{ old('tipo', isset($vaga->tipo) && $vaga->tipo == 'CLT' ? ' selected ' : '') }}
                        value="CLT">CLT</option>
                    <option
                        {{ old('tipo', isset($vaga->tipo) && $vaga->tipo == 'Pessoa Jurídica' ? ' selected ' : '') }}
                        value="Pessoa Jurídica">Pessoa Jurídica</option>
                    <option {{ old('tipo', isset($vaga->tipo) && $vaga->tipo == 'Freelancer' ? ' selected ' : '') }}
                        value="Freelancer">Freelancer</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="descricao">Descricao:</label>
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="2">{{ old('descricao', isset($vaga->descricao) ? $vaga->descricao : '') }}</textarea>
            </div>

            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar </button>
                <a href="{{ route('vagas.index') }}" class="btn btn-danger"><i class="fa fa-times"></i>
                    Cancelar</a>
            </div>
    </form>

    <script src="{{ asset('js/Vagas.js') }}"></script>
@endsection
