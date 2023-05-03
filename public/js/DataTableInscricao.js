$(document).ready(function () {
    // URL da API 
    var apiUrl = '/api/candidatura';
    // Colunas da tabela
    var columns = [
        {
            data: 'nome',
            title: 'Nome',
            width: "280px",
        },
        {
            data: 'telefone',
            title: 'Telefone',
            width: "100px",
        },
        {
            data: 'titulo',
            title: 'Vaga',
            width: "250px",
        },
        {
            data: 'descricao',
            title: 'Descrição',
            width: "350px",

        },
        {
            data: 'curriculo',
            title: 'Currículo',
            width: "350px",

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
            title: 'Status',
            width: "80px",
            render: function (data, type, row) {
                if (data) {
                    return '<span class="btn btn-danger btn-sm">Inativa</span>';
                } else {
                    return '<span class="btn btn-success btn-sm">Ativa</span>';
                }
            },
            className: 'text-center'
        },
        {
            data: 'created_at',
            title: 'Data Cadastro',
            width: "120px",
            render: function (data, type, row) {
                var dataFormatada = moment(data).format('DD/MM/YYYY HH:mm');
                return dataFormatada;
            }
        },
        {
            data: 'id',
            title: 'Ações',
            width: "100px",
            render: function (data, type, row) {
                var nome = row.titulo;
                var btnDeletar = '<button type="button" data-bs-target="#ModalDeletar" data-bs-toggle="modal" data-id="' + data + '" data-nome="' + nome + '" class="btn btn-danger btn-sm excluir-vaga"><i class="bi bi-trash"></i></button>';
    
                return btnDeletar;

            },
            className: 'text-center'
        },
    ];

    // Inicializa o DataTables na tabela HTML
    $('#TableVagas').DataTable({
        processing: true,
        serverSide: true,
        searching:false,
        ajax: {
            url: apiUrl,
            method: 'GET',
            // filtro
            data: function (d) {
                d.data_inicio = $('#data_inicio').val(); 
                d.data_fim = $('#data_fim').val(); 
                d.pausada = $('#pausada').val(); 
                d.tipo = $('#tipo').val(); 
                d.titulo = $('#titulo').val(); 
                d.descricao = $('#descricao').val(); 
            }
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
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "Todos"]],
        pageLength: 20
    });
});

// recarrega tabela com  valor do filtrado

$('#data_inicio,#data_fim,#titulo,#descricao,#pausada, #tipo').on('change', function () {
    $('#TableVagas').DataTable().ajax.reload(); 
});


// Deletar
// Adicione um evento de clique ao botão de excluir
$(document).on("click", ".excluir-vaga", function (e) { 
    e.preventDefault();

    var id = $(this).data('id');
    var nome = $(this).data('nome');
    $('#nome-usuario').text(nome);

    var formAction = $('#formExcluir').attr('action').replace(':id', id);
    $('#formExcluir').attr('action', formAction);
    // Atualize o valor do input hidden com o ID da vaga
    $('#formExcluir input[name="id"]').val(id);

    // Exiba o modal de exclusão
    $('#ModalDeletar').modal('show');
});
// Concluir o delete
$(document).on("submit", "#formExcluir", function (e) {
    e.preventDefault();
    var form = this;
    function showError() {
        toastr.error('Ocorreu um erro ao remover candidatura.');
    }
    $.ajax({
        url: form.action,
        type: form.method,
        data: $(form).serialize(),
        success: function (response, status, xhr) {
            if (xhr.status === 200) {
                toastr.success('Candidatura removida com sucesso!');
                $('#ModalDeletar').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                showError();
            }
        },
        error: function (xhr) {
            showError();
        },
        complete: function () {
            $('#ModalDeletar').modal('hide');
        }
    });
});
