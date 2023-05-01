@extends('template/layout')
@section('title', 'Vagas')
@section('conteudo')

    <h5>Vagas</h5>
    {{-- @include('mensagens.mensagens') --}}

    <!-- adc -->
    <div class="input-group mb-3">
        <div class="input-group-append">
            <a href="{{ route('vagas.create') }}" class="btn btn-success">Adicionar</a>
        </div>
    </div>
    {{-- Datatable --}}
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
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('js/DataTableVagas.js') }}"></script>
@endsection
