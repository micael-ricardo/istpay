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
{{-- @endsection --}}






{{-- jquery --}}
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>

{{-- boodstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
{{-- datatable --}}
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />


{{-- boodstrap --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>
{{-- datatable --}}
<script type="text/javascript" src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
 {{-- moment --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script src="{{ asset('js/DataTableVagas.js') }}"></script>
