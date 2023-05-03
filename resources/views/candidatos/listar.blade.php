@extends('template/layout')
@section('title', 'Candidatos')
@section('conteudo')

    <h5>Candidatos</h5>
    @include('mensagens.mensagem')

    <!-- adc -->
    <div class="input-group mb-3">
        <div class="input-group-append">
            <a href="{{ route('candidatos.create') }}" class="btn btn-success"><i class="bi bi-plus"></i> Adicionar</a>
            <button type="button" data-bs-target="#vagasModal" data-bs-toggle="modal" class="btn btn-primary excluir-vaga"><i
                    class="bi bi-plus"></i> Vagas</button>
            <button type="button" class="btn btn-info" id="div-filtro" onclick="return($('#filtro').toggle('fade'))">
                <i class="bi bi-funnel"></i> Filtros
            </button>
        </div>
    </div>
    <!--  filtros -->
    <div class="panel panel-inverse" id="filtro" style=" display: none;">
        <div class="row">
            <div class="form-group col-sm-4">
                <label>Data Início:</label>
                <input type="date" class="form-control" name="data_inicio" id="data_inicio" />
            </div>

            <div class="form-group col-sm-4">
                <label>Data Fim:</label>
                <input type="date" class="form-control" name="data_fim" id="data_fim" />
            </div>

            <div class="form-group col-sm-4">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" />
            </div>
            <div class="form-group col-sm-4">
                <label>Email:</label>
                <input type="text" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group col-sm-4">
                <label>Telefone:</label>
                <input type="tel" class="form-control" name="telefone" id="telefone" />
            </div>
            <div class="form-group col-sm-4">
                <label>Currículo:</label>
                <input type="text" class="form-control" name="curriculo" id="curriculo" />
            </div>

        </div>
    </div>


    {{-- Datatable --}}
    <div class="row mt-4">
        <table id="TableVagas" class="table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Curriculo</th>
                    <th>Data Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- Modal De Delete -->
    <div class="modal fade" id="ModalDeletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        role="dialog" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">Excluir Candidato</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-body" class="modal-body">
                    Tem certeza que deseja excluir candidato: <b><span id="nome-usuario"> </span></b> ? Esta ação
                    não pode ser desfeita.
                </div>
                <div class="modal-footer">
                    <form id="formExcluir" action="{{ route('candidatos.delete', ':id') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Vagas -->
    <div class="modal fade" id="vagasModal" tabindex="-1" role="dialog" aria-labelledby="vagasModalLabel"
        aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-2" id="vagasModalLabel">Vagas disponíveis</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" class="modal-body">
                    <select id="vagasSelect" class="form-control select2-container">
                        <option value=""></option>
                        @foreach ($vagas as $vaga)
                            <option value="{{ $vaga->id }}" data-descricao="{{ $vaga->descricao }}"
                                data-tipo-contrato="{{ $vaga->tipo }}">{{ $vaga->titulo }}</option>
                        @endforeach
                    </select>
                    <div id="vagaDescricao"></div>
                </div>
                <div class="modal-footer">
                    <form method="POST"
                        action="{{ isset($candidato) ? route('candidatos.atualizar', $candidato->id) : route('candidatos.store') }}">
                        @csrf
                        <input type="hidden" name="vaga_id" id="vaga_id" value="">
                        <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/DataTableCandidatos.js') }}"></script>
    <script src="{{ asset('js/Candidatos.js') }}"></script>
@endsection
