<?php
use Hcode\Model\User;
use Hcode\Model\CliForGrupo;

use Hcode\PageAdmin;

// Rota para testes
$app->post("/admin/cliforgrupo/teste", function(){

    var_dump($_POST);
    exit;

});

// Renderiza a página de listagem de Grupos de Clientes/Fornecedores
$app->get("/admin/cliforgrupo/listar", function(){

    User::verifyLogin();

    $cliforgrupos = CliForGrupo::listAll();
    $page = new PageAdmin();

    $page->setTpl("cliforgrupo-listar", [
        'cliforgrupos'=>$cliforgrupos
    ]);

});

// Renderiza a página de cadastro de Grupos de Clientes/Fornecedores
$app->get("/admin/cliforgrupo/novo", function(){

    User::verifyLogin();

    $page = new PageAdmin();
    $page->setTpl("cliforgrupo-novo", [

    ]);

});

// Salva um Grupo de Clientes/Fornecedores no banco
$app->post("/admin/cliforgrupo/novo", function(){

    User::verifyLogin();

    $cliforgrupo = new CliForGrupo();
    $cliforgrupo->setData($_POST);
    $cliforgrupo->save();

    header("Location: /admin/cliforgrupo/listar");
    exit;

});

// Deleta um Grupo de Clientes/Fornecedores no banco
$app->get("/admin/cliforgrupo/:id/excluir", function($id){

    User::verifyLogin();

    $cliforgrupo = new CliForGrupo();
    $cliforgrupo->get((int)$id);
    $cliforgrupo->delete();

    header("Location: /admin/cliforgrupo/listar");
    exit;

});

// Renderiza página de edição do Grupo Cliente/Fornecedores
$app->get("/admin/cliforgrupo/editar/:id", function($id){

    User::verifyLogin();

    $cliforgrupo = new CliForGrupo();
    $cliforgrupo->get((int)$id);

    $page = new PageAdmin();
    $page->setTpl("cliforgrupo-editar", array(
        'cliforgrupo'=>$cliforgrupo->getValues()
    ));
});

// Realiza a edição do Grupo Cliente/Fornecedores
$app->post("/admin/cliforgrupo/editar/:id", function($id){

    User::verifyLogin();

    $cliforgrupo = new CliForGrupo();
    $cliforgrupo->get((int)$id);
    $cliforgrupo->setData($_POST);
    $cliforgrupo->save();

    header('Location: /admin/cliforgrupo/listar');
    exit;
});