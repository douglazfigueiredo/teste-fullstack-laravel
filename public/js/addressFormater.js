$(document).ready(function() {
    $('#cep').mask('00000-000');
    $('#cep').on('blur', function() {
        var cep = $(this).val().replace(/\D/g, '');

        if (cep.length != 8) {
            return;
        }

        $.getJSON('https://viacep.com.br/ws/' + cep + '/json/', function(data) {
            if (!("erro" in data)) {
                $('#logradouro').val(data.logradouro);
                $('#bairro').val(data.bairro);
                $('#cidade').val(data.localidade);
                $('#uf').val(data.uf);
            }
        });
    });
});
