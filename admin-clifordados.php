<?php
use Hcode\Model\User;
use Hcode\Model\City;
use Hcode\Model\Uf;
use Hcode\Model\CliForGrupo;
use Hcode\Model\CliForDados;

use Hcode\PageAdmin;

// Rota para testes
$app->get("/admin/clifordados/teste", function(){

     print_r(CliForDados::listarTodos());

});

// Renderiza a página de listagem de Clientes/Fornecedores
$app->get("/admin/clifordados/listar", function(){

    User::verifyLogin();

    $clifordados = CliForDados::listarTodos();
    $cidades = City::listAll();
    $cliforgrupos = CliForGrupo::listAll();
    
    $page = new PageAdmin();
    $page->setTpl("clifordados-listar", [
        'clifordados'=>$clifordados,
        'cidades'=>$cidades,
        'cliforgrupos'=>$cliforgrupos
    ]);

});

// Renderiza a página de cadastro de Clientes/Fornecedores
$app->get("/admin/clifordados/novo", function(){

    User::verifyLogin();

    $cidades = City::listAll();
    $ufs = Uf::listAll();
    $cliforgrupos = CliForGrupo::listAll();

    $page = new PageAdmin();
    $page->setTpl("clifordados-novo", array(
        'cidades'=>$cidades,
        'ufs'=>$ufs,
        'cliforgrupos'=>$cliforgrupos
    ));
});

// Salva um Cliente/Fornecedor no banco
$app->post("/admin/clifordados/salvar", function(){

    User::verifyLogin();

    $clifordados = new CliForDados();

    $pf = array();
    $pj = array();

    //print_r($_POST);
    
    if(isset($_POST['tipo_pe']) && $_POST['tipo_pe'] == 'f'){
        $pf['tipo_pe'] = $_POST['tipo_pe'];
        $pf['tipo_cf'] = $_POST['tipo_cf'];
        $pf['nome_rs'] = strtoupper($_POST['nome']);
        $pf['apel_nome_f'] = strtoupper($_POST['apelido']);
        $pf['cpf_cnpj'] = $_POST['cpf'];
        $pf['rg_ie'] = limpaRG_IE($_POST['rg']);
        $pf['nasc_abert'] = date('Y-m-d', strtotime($_POST['nascimento']));
        $pf['responsavel'] = strtoupper($_POST['responsavel']);
        $pf['celular'] = $_POST['celular'];
        $pf['telefone'] = $_POST['telefone'];
        $pf['email'] = $_POST['email'];
        $pf['grupo'] = $_POST['grupo'];
        $pf['cep'] = $_POST['cep'];
        $pf['logradouro'] = $_POST['logradouro'];
        $pf['numero'] = $_POST['numero'];
        $pf['bairro'] = $_POST['bairro'];
        $pf['uf'] = $_POST['uf'];
        $pf['cidade'] = $_POST['cidade'];
        $pf['obs'] = $_POST['obs'];

        try {
            $clifordados->setData($pf);
            $clifordados->save();
        } catch (\Throwable $th) {
            throw $th;
        }

        

    }else if(isset($_POST['tipo_pe']) && $_POST['tipo_pe'] == 'j'){
        
        $pj['tipo_pe'] = $_POST['tipo_pe'];
        $pj['tipo_cf'] = $_POST['tipo_cf'];
        $pj['nome_rs'] = strtoupper($_POST['razao_social']);
        $pj['apel_nome_f'] = strtoupper($_POST['nome_fantasia']);
        $pj['cpf_cnpj'] = $_POST['cnpj'];
        $pj['rg_ie'] = limpaRG_IE($_POST['ie']);
        $pj['nasc_abert'] = date('Y-m-d', strtotime($_POST['dt_abertura']));
        $pj['responsavel'] = strtoupper($_POST['responsavel']);
        $pj['celular'] = $_POST['celular'];
        $pj['telefone'] = $_POST['telefone'];
        $pj['email'] = $_POST['email'];
        $pj['grupo'] = $_POST['grupo'];
        $pj['cep'] = $_POST['cep'];
        $pj['logradouro'] = $_POST['logradouro'];
        $pj['numero'] = $_POST['numero'];
        $pj['bairro'] = $_POST['bairro'];
        $pj['uf'] = $_POST['uf'];
        $pj['cidade'] = $_POST['cidade'];
        $pj['obs'] = $_POST['obs'];

        $clifordados->setData($pj);
        $clifordados->save();

    }

    header("Location: /admin/clifordados/listar");
    exit;
    
});

// Deleta um Cliente/Fornecedor no banco
$app->get("/admin/clifordados/:id/excluir", function($id){

    User::verifyLogin();

    $clifordados = new CliForDados();
    $clifordados->get((int)$id);
    $clifordados->delete();

    header("Location: /admin/clifordados/listar");
    exit;
});

// Renderiza página de edição do Cliente/Fornecedor
$app->get("/admin/clifordados/editar/:id", function($id){

    User::verifyLogin();

    $clifordados = new CliForDados();
    $clifordados->get((int)$id);

    $cidades = City::listAll();
    $ufs = Uf::listAll();
    $cliforgrupos = CliForGrupo::listAll();

    $page = new PageAdmin();
    $page->setTpl("clifordados-editar", array(
        'clifordados'=>$clifordados->getValues(),
        'cidades'=>$cidades->getValues(),
        'ufs'=>$ufs->getValues(),
        'cliforgrupos'=>$cliforgrupos->getValues()
    ));
});

// Realiza edição do Cliente/Fornecedor no Banco
$app->post("/admin/clifordados/editar/:id", function($id){

    User::verifyLogin();

    $clifordados = new CliForDados();
    $clifordados->get((int)$id);
    $clifordados->setData($_POST);
    $clifordados->save();

    header('Location: /admin/clifordados/listar');
    exit;
});