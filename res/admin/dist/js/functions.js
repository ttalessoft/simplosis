//FUNCAO PARA ESCONDER E APRESENTAR CAMPOS
$(document).ready(function () {
    $("#dados").hide();
    $("input[name$='cli_tipo']").click(function () {
        var test = $(this).val();
        if (test[0] === 'f') {
            definePessoaFisica();
            console.log('Pessoa física')
        } else {
            definePessoaJuridica();
            console.log('Pessoa jurídica')
        }
    });
});

function definePessoaFisica() {
    $('#dados_pf').fadeIn(100);
    $('#dados').fadeIn(100);
    $('#dados_pj').fadeOut(300);
    $('#btn_pf').addClass('btn btn-block btn-success');
    $('#btn_pj').removeClass();
    $('#btn_pj').addClass('btn btn-block btn-default');
}

function definePessoaJuridica() {
    $('#dados_pj').fadeIn(100);
    $('#dados').fadeIn(100);
    $('#dados_pf').fadeOut(300);
    $('#btn_pj').addClass('btn btn-block btn-success');
    $('#btn_pf').removeClass();
    $('#btn_pf').addClass('btn btn-block btn-default');
}
// $(function () {
//     $('#btn_pf').bind('click', function (e) {
//         $('#dados_pf').fadeIn(100);
//         $('#dados_pj').fadeOut(300);
//         $('#btn_pf').addClass('btn btn-block btn-success');
//         $('#btn_pj').removeClass();
//         $('#btn_pj').addClass('btn btn-block btn-default');

//     });

//     $('#btn_pj').bind('click', function (e) {
//         $('#dados_pj').fadeIn(100);
//         $('#dados_pf').fadeOut(300);
//         $('#btn_pj').addClass('btn btn-block btn-success');
//         $('#btn_pf').removeClass();
//         $('#btn_pf').addClass('btn btn-block btn-default');

//     });
// });