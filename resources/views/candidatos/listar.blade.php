@extends('template/layout')
@section('title', 'Vagas')
@section('conteudo')

    <h5>Vagas</h5>
    @include('mensagens.mensagem')

    <!-- adc -->
    <div class="input-group mb-3">
        <div class="input-group-append">
            <a href="{{ route('vagas.create') }}" class="btn btn-success">Adicionar</a>
            <button class="btn btn-info" type="button" id="div-filtro" onclick="return($('#filtro').toggle('fade'))">
                <i class="fa fa-filter"></i> Filtros
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

        <!-- Modal De Delete -->
        <div class="modal fade" id="ModalDeletar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            role="dialog" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="exampleModalLabel">Excluir vaga</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modal-body" class="modal-body">
                        Tem certeza que deseja excluir a vaga: <b><span id="nome-usuario"> </span></b> ? Esta ação
                        não pode ser desfeita.
                    </div>
                    <div class="modal-footer">
                        <form id="formExcluir" action="{{ route('vagas.delete', ':id') }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal de Pausar e Inicar Vaga --}}
        <div class="modal fade" id="ModalPausar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            role="dialog" aria-modal="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modal-titulo"> {{-- Texto vem do js de acordo com o status da vaga --}} </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div id="modal-body" class="modal-body">
                        {{-- Texto vem do js de acordo com o status da vaga --}}
                    </div>
                    <div class="modal-footer">
                        <form id="formPausar" action="#" method="post">
                            @csrf
                            <input type="hidden" name="id">
                            <input type="hidden" name="pausada">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/DataTableVagas.js') }}"></script>
@endsection
