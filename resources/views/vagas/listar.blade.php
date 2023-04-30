{{-- @extends('dashboard/layout')
@section('title', 'Despesas')
@section('conteudo') --}}

  <h5>Vagas</h5>
  {{-- @include('mensagens.mensagens') --}}

  <!-- adc -->
  <div class="input-group mb-3">
      <div class="input-group-append">
          <a href="{{ route('vagas.create') }}" class="btn btn-success">Adicionar</a>
      </div>
  </div>
     {{-- Datatable --}}
     {{-- <div class="row mt-4">
        @include('despesas.dataTable')
    </div> --}}
{{-- @endsection --}}