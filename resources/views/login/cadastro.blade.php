@extends('template/layout')
@if (isset($vaga))
    @section('title', 'Editar Candidatos')
@else
    @section('title', 'Cadastrar Candidatos')
@endif
@section('conteudo')

    <div class="titulo">
        <h5>{{ isset($vaga) ? 'Editar Candidatos' : 'Cadastro Candidatos' }}</h5>
    </div>

    @include('mensagens.mensagem')
    <form method="POST" action="{{ route('usuarios.store') }}">
        {{-- previne ataques CSRF --}}
        @csrf
        @if (isset($vaga))
            @method('PATCH')
        @endif

        <div class="row mt-4">
            <div class="form-group col-md-6">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome"
                    value="{{ old('nome', isset($vaga) ? $vaga->titulo : '') }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="telefone">Telefone:</label>
                <input type="number" class="form-control" name="telefone" id="telefone"
                    value="{{ old('telefone', isset($vaga) ? $vaga->telefone : '') }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', isset($vaga) ? $vaga->titulo : '') }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="password">senha:</label>
                <input type="password" class="form-control" name="password" id="password" autocomplete="new-password"
                    required>
            </div>


            <div class="form-group col-md-12">
                <label for="curriculo">Curriculo:</label>
                <textarea class="form-control" name="curriculo" id="curriculo" cols="30" rows="5">{{ old('curriculo', isset($vaga->curriculo) ? $vaga->curriculo : '') }}</textarea>
            </div>

            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar </button>
                <a href="{{ route('candidatos.index') }}" class="btn btn-danger"><i class="fa fa-times"></i>
                    Cancelar</a>
            </div>
    </form>
@endsection
