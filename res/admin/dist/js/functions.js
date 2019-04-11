$("input").on("click", function () {

    if ($("input:checked").val() === 'j') {

        $("#cli_nome").prop("disabled", true);
        $("#cli_cpf").prop("disabled", true);
        $("#datepicker").prop("disabled", true);

        $("#cli_razao_social").prop("disabled", false);
        $("#cli_cnpj").prop("disabled", false);
        $("#cli_ie").prop("disabled", false);

    } else if ($("input:checked").val() === 'f') {

        $("#cli_razao_social").prop("disabled", true);
        $("#cli_cnpj").prop("disabled", true);
        $("#cli_ie").prop("disabled", true);

        $("#cli_nome").prop("disabled", false);
        $("#cli_cpf").prop("disabled", false);
        $("#datepicker").prop("disabled", false);

    }
});