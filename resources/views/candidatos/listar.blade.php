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
                <label>Titulo:</label>
                <input type="text" class="form-control" name="titulo" id="titulo" />
            </div>
            <div class="form-group col-sm-4">
                <label>Descricao:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" />
            </div>

            <div class="form-group col-sm-4">
                <label for="tipo">Tipo de Contrato:</label>
                <select class="form-control" name="tipo" id="tipo">
                    <option value="">Selecione</option>
                    <option value="CLT">CLT</option>
                    <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                    <option value="Freelancer">Freelancer</option>
                </select>
            </div>

            <div class="form-group col-sm-4">
                <label for="pausada">Status:</label>
                <select class="form-control" name="pausada" id="pausada">
                    <option value="">Selecione</option>
                    <option value="1">Inativa</option>
                    <option value="0">Ativa</option>
                </select>
            </div>
        </div>
    </div>


    {{-- Datatable --}}
    <div class="row mt-4">
        <table id="TableVagas" class="table table-striped table-bordered w-100">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Descricao</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Data Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

        <!-- Modal Vagas -->
        <div class="modal fade" id="vagasModal" tabindex="-1" role="dialog" aria-labelledby="vagasModalLabel" aria-hidden="true" data-backdrop="false">
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
                                <option value="{{ $vaga->id }}" data-descricao="{{ $vaga->descricao }}" data-tipo-contrato="{{ $vaga->tipo}}">{{ $vaga->titulo }}</option>
                            @endforeach
                        </select>
                        <div id="vagaDescricao"></div>
                    </div>
                    <div class="modal-footer">
                        <form id="formExcluir" action="{{ route('vagas.delete', ':id') }}" method="post">
                            @csrf
                            <input type="hidden" name="id">
                            <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Salvar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Candidatos.js') }}"></script>
@endsection
