
$(document).ready(function() {
    $('#vagasSelect').select2({
        placeholder: 'Selecione uma vaga',
        allowClear: true,
        dropdownParent: $('#vagasModal')
    });

    $('#vagasSelect').on('change', function() {
        var id = $(this).val();

        if (id) {
            var vaga = $('#vagasSelect option:selected');
            var descricao = vaga.data('descricao');
            var tipo_contrato = vaga.data('tipo-contrato');

            $('#vagaDescricao').html('<p><strong>Descrição:</strong> ' + descricao + '</p><p><strong>Tipo de contrato:</strong> ' + tipo_contrato + '</p>');
        } else {
            $('#vagaDescricao').empty();
        }
    });
});