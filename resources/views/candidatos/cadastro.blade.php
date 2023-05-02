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
    <form method="POST" action="{{ isset($vaga) ? route('candidatos.atualizar', $vaga->id) : route('candidatos.store') }}">
        {{-- previne ataques CSRF --}}
        @csrf
        @if (isset($vaga))
            @method('PATCH')
        @endif

        <div class="row mt-4">

            <div class="form-group col-md-4">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome"
                    value="{{ old('nome', isset($vaga) ? $vaga->titulo : '') }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email"
                    value="{{ old('email', isset($vaga) ? $vaga->titulo : '') }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="telefone">Telefone:</label>
                <input type="tel" class="form-control" name="telefone" id="telefone"
                    pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}"
                    value="{{ old('telefone', isset($vaga) ? $vaga->telefone : '') }}" required>
            </div>

            {{-- <div class="form-group col-md-4">
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
            </div> --}}

            <div class="form-group col-md-12">
                <label for="curriculo">Curriculo:</label>
                <textarea class="form-control" name="curriculo" id="curriculo" cols="30" rows="5">{{ old('curriculo', isset($vaga->curriculo) ? $vaga->curriculo : '') }}</textarea>
            </div>

            <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar </button>
                <a href="{{ route('vagas.index') }}" class="btn btn-danger"><i class="fa fa-times"></i>
                    Cancelar</a>
            </div>
    </form>

    <script src="{{ asset('js/Vagas.js') }}"></script>
@endsection
