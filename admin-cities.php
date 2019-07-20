<?php
use Hcode\Model\User;

use Hcode\Model\State;
use Hcode\Model\City;
use Hcode\Model\Uf;

use Hcode\PageAdmin;

$app->get("/admin/post-cidades", function(){
    
    var_dump($cities = City::listAll());

});

// Renderiza página de lista de Cidades
$app->get("/admin/cities", function(){

    User::verifyLogin();
    
    $cities = City::listAll();
    $page = new PageAdmin();
    
    $page->setTpl("cities", [
        'cities'=>$cities
    ]);

});

// Rendereiza a página de cadastro de cidades
$app->get("/admin/cities/create", function(){

    User::verifyLogin();

    $ufs = Uf::listAll();

    $page = new PageAdmin();
    $page->setTpl("cities-create", [
        'ufs'=>$ufs
    ]);

});

// Salva uma cidade no banco
$app->post("/admin/cities/create", function(){

    User::verifyLogin();

    $city = new City();
    $city->setData($_POST);
    $city->save();

    header("Location: /admin/cities");
    exit;
    
});

// Deleta uma cidade no banco
$app->get("/admin/cities/:idcity/delete", function($idcity){

    User::verifyLogin();

    $city = new City();
    $city->get((int)$idcity);
    $city->delete();

    header("Location: /admin/cities");
    exit;

});