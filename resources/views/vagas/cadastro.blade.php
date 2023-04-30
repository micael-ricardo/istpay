{{-- @extends('dashboard/layout')
@if (isset($despesa))
    @section('title', 'Editar Despesa')
@else
    @section('title', 'Despesas')
@endif
@section('conteudo') --}}

    {{-- <div class="titulo">
        <h5>{{ isset($despesa) ? 'Editar Despesa' : 'Cadastro Despesas' }}</h5>
    </div> --}}

    {{-- @include('mensagens.mensagens') --}}
    <form method="POST" action="{{ isset($despesa) ? route('vagas.atualizar', $despesa->id) : route('vagas.store') }}">
        {{-- previne ataques CSRF --}}
        @csrf
        {{-- @if (isset($despesa))
            @method('PATCH')
        @endif --}}

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>
        
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="CLT">CLT</option>
            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
            <option value="Freelancer">Freelancer</option>
        </select>

        <br><br>

        <div class="col-md-12 mt-4">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar </button>
            <a href="{{ route('vagas.index') }}" class="btn btn-danger"><i class="fa fa-times"></i>
                Cancelar</a>
        </div>
    </form>
    {{-- <script src="{{ asset('js/despesas.js') }}"></script> --}}
{{-- @endsection --}}