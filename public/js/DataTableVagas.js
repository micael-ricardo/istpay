$(document).ready(function () {
    // URL da API 
    var apiUrl = '/api/vagas';
    // Colunas da tabela
    var columns = [
        {
            data: 'titulo',
            title: 'Titulo',
            width: "250px",
        },
        {
            data: 'descricao',
            title: 'Descricao',

        },
        {
            data: 'tipo',
            title: 'Tipo',
            width: "100px",
            render: function (data, type, row) {
                if (data == 'CLT') {
                    return '<span class="btn btn-info btn-sm"> CLT </span>';
                } else if (data == 'Pessoa Jurídica') {
                    return '<span class="btn btn-warning btn-sm"> Pessoa Jurídica </span>';
                } else {
                    return '<span class="btn btn-secondary btn-sm"> Freelancer </span>';
                }
            },
            className: 'text-center'
        },

        {
            data: 'pausada',
            title: 'Pausada',
            width: "80px",
            render: function (data, type, row) {
                if (data) {
                    return '<span class="btn btn-danger btn-sm">Sim</span>';
                } else {
                    return '<span class="btn btn-success btn-sm">Não</span>';
                }
            },
            className: 'text-center'
        },
        {
            data: 'created_at',
            title: 'Data Cadastro',
            width: "150px",
            render: function (data, type, row) {
                var dataFormatada = moment(data).format('DD/MM/YYYY HH:mm');
                return dataFormatada;
            }
        },
        {
            data: 'id',
            title: 'Ações',
            width: "80px",
            render: function (data, type, row) {
                var nome = row.despesa_descricao;
                var btnEditar = '<a href="/despesas/' + data + '/edit" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i></a>';
                var btnDeletar = '<button type="button"  data-bs-target="#exampleModal"  data-bs-toggle="modal"  data-id=' + data + ' data-nome=' + nome + ' " class="btn btn-danger btn-sm excluir-despesa"><i class="bi bi-trash"></i></button>';
                return btnEditar + ' ' + btnDeletar;
            },
        },
    ];

    // Inicializa o DataTables na tabela HTML
    $('#TableVagas').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: apiUrl,
            method: 'GET',
        },
        columns: columns,
        responsive: true,
        scrollX: true,
        scrollY: '250px',
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
    });
});