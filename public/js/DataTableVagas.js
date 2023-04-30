$(document).ready(function () {
    // URL da API Laravel
    var apiUrl = '/api/vagas';

    console.log(apiUrl);

    // Colunas da tabela
    var columns = [
        { data: 'id', title: 'ID' },
        // { data: 'nome', title: 'Nome' },
        // { data: 'email', title: 'E-mail' },
        // { data: 'created_at', title: 'Criado em' },
        // { data: 'updated_at', title: 'Atualizado em' },
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
            // Personaliza as mensagens do DataTables
            // ...
        },
    });
});