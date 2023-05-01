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
                var pausada = row.pausada;
                var nome = row.titulo;
                var btnEditar = '<a href="/vagas/' + data + '/edit" class="btn btn-info btn-sm"><i class="bi bi-pencil"></i></a>';
                var btnDeletar = '<button type="button" data-bs-target="#ModalDeletar" data-bs-toggle="modal" data-id="' + data + '" data-nome="' + nome + '" class="btn btn-danger btn-sm excluir-vaga"><i class="bi bi-trash"></i></button>';
                var btnPausar = '';
                if (pausada) {
                    btnPausar = '<button type="button" data-bs-target="#ModalPausar" data-bs-toggle="modal" data-id="' + data + '" data-nome="' + nome + '"  data-pause="' + pausada + '" class="btn btn-success btn-sm pausar-vaga"><i class="bi bi-play"></i></button>';
                } else {
                    btnPausar = '<button type="button" data-bs-target="#ModalPausar" data-bs-toggle="modal" data-id="' + data + '" data-nome="' + nome + '" data-pause="' + pausada + '" class="btn btn-danger btn-sm pausar-vaga"><i class="bi bi-stop"></i></button>';
                }

                return btnEditar + ' ' + btnDeletar + ' ' + btnPausar;

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
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "Todos"]],
        pageLength: 20
    });
});


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


// Adicione um evento de clique ao botão Pause e start

$('#ModalPausar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var pausada = button.data('pause');
    var nome = button.data('nome');
    var modal = $(this);
    // Inserir texto de acordo com a o status da vaga
    var titulo = pausada ? 'Iniciar vaga' : 'Pausar vaga';
    var texto = pausada ? 'Tem certeza que deseja iniciar a vaga: <b><span id="nome-usuario">' + nome + '</span></b> ?' : 'Tem certeza que deseja pausar a vaga: <b><span id="nome-usuario">' + nome + '</span></b> ?';
    modal.find('#modal-titulo').text(titulo);
    modal.find('#modal-body').html(texto);
    modal.find('input[name="id"]').val(button.data('id'));
    modal.find('input[name="pausada"]').val(pausada ? 0 : 1);
});


// Concluir o delete
$(document).on("submit", "#formExcluir", function (e) {
    e.preventDefault();
    var form = this;
    function showError() {
        toastr.error('Ocorreu um erro ao excluir a vaga.');
    }
    $.ajax({
        url: form.action,
        type: form.method,
        data: $(form).serialize(),
        success: function (response, status, xhr) {
            if (xhr.status === 200) {
                toastr.success('Vaga excluída com sucesso!');
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

// Parar ou iniciar vaga
$(document).on("submit", "#formPausar", function (event) {
    event.preventDefault();
    var form = $(this);
    var id = form.find('input[name="id"]').val();
    var pausada = form.find('input[name="pausada"]').val();
    function showError() {
        toastr.error('Ocorreu um erro ao atualizar o status da vaga.');
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/vagas/' + id + '/atualizar-status',
        type: 'POST',
        data: {
            pausada: pausada
        },
        success: function (response) {
            toastr.success('Status Atualizado  com sucesso!');
            $('#ModalDeletar').modal('hide');
            setTimeout(function () {
                location.reload();
            }, 1000);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText);
            showError();
        }
    });
});