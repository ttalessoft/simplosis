$(function () {
    $('#btn_pf').bind('click', function (e) {
        $('#dados_pf').fadeIn(100);
        $('#dados_pj').fadeOut(300);
        $('#btn_pf').addClass('btn btn-block btn-success');
        $('#btn_pj').removeClass();
        $('#btn_pj').addClass('btn btn-block btn-default');
    });
    $('#btn_pj').bind('click', function (e) {
        $('#dados_pj').fadeIn(100);
        $('#dados_pf').fadeOut(300);
        $('#btn_pj').addClass('btn btn-block btn-success');
        $('#btn_pf').removeClass();
        $('#btn_pf').addClass('btn btn-block btn-default');
    });
});